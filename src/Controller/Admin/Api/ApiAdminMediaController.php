<?php


namespace App\Controller\Admin\Api;

use App\Controller\Admin\AdminControllerInterface;
use App\Entity\House;
use App\Entity\Media;
use App\Form\MediaType;
use App\Repository\HouseRepository;
use App\Repository\MediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Imagine\Filter\ImagineAware;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

/**
 * @IsGranted("ROLE_USER")
 */
class ApiAdminMediaController extends AbstractController implements AdminControllerInterface
{
    /**
     * @Route("/api/admin/media/{id}", name="api.admin.media.delete", methods="DELETE")
     *
     * @param Request $request
     * @param Media $media
     * @param EntityManagerInterface $manager
     * @return JsonResponse
     */
    public function delete (Request $request, Media $media, EntityManagerInterface $manager) {
        $data = json_decode($request->getContent(), true);

        $token = $data['_token'];
        $isCsrfValid = $this->isCsrfTokenValid(
            'delete' . $media->getId(),
            $token
        );

        if (!$isCsrfValid) {
            return new JsonResponse([ 'error' => 'Token CSRF invalide' ], 400);
        }

        $manager->remove($media);
        $manager->flush();

        return new JsonResponse([ 'success' => 1 ]);
    }

    /**
     * @Route("/api/admin/house/media/{id}", name="api.admin.house.media.edit", methods={"POST"})
     *
     * @param Media $media
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */
    public function edit (Media $media, Request $request, EntityManagerInterface $manager, ValidatorInterface $validator) {
        $form = $this->createForm(MediaType::class, $media, [ 'csrf_protection' => false ]);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            return new JsonResponse([
                'success' => 1,
                'media' => [
                    'id' => $media->getId(),
                    'alt' => $media->getAlt(),
                ],
            ]);
        }

        $errors = [];

        foreach ($validator->validate($media) as $error) {
            $errors[] = $error->getMessage();
        }

        return new JsonResponse([ 'success' => 0, 'violations' => $errors], 400);
    }

    /**
     * @Route("/api/admin/{id}/media/add", name="api.admin.house.media.add", methods={"POST"})
     *
     * @param Request $request
     * @param House $house
     * @param EntityManagerInterface $manager
     * @param ValidatorInterface $validator
     * @param CsrfTokenManagerInterface $tokenManager
     * @param UploaderHelper $helper
     * @return JsonResponse|Response
     */
    public function form (Request $request, House $house,EntityManagerInterface $manager, CacheManager $cacheManager, ValidatorInterface $validator, CsrfTokenManagerInterface $tokenManager, UploaderHelper $helper) {
        $media = new Media();

        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $media->setHouse($house);
            $manager->persist($media);
            $manager->flush();

            return new JsonResponse([
                'success' => 1,
                'media' => [
                    'id' => $media->getId(),
                    'alt' => $media->getAlt(),
                    'filename' => $cacheManager->generateUrl($helper->asset($media, 'imageFile'), 'xs_max_down_scale_filter'),
                    'token' => $tokenManager->getToken('delete'.$media->getId())->getValue(),
                ],
                'url' => $this->generateUrl('api.admin.media.delete', [ 'id' => $media->getId() ])
            ]);
        }

        $errors = [];

        foreach ($validator->validate($media) as $error) {
            $errors[] = $error->getMessage();
        }

        return new JsonResponse([ 'success' => 0, 'violations' => $errors], 400);
    }
}