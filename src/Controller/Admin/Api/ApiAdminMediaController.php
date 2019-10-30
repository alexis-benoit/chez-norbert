<?php


namespace App\Controller\Admin\Api;

use App\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_USER")
 */
class ApiAdminMediaController extends AbstractController
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
}