<?php

namespace App\Controller\Admin;

use App\Entity\House;
use App\Entity\Media;
use App\Form\HouseType;
use App\Form\MediaType;
use App\Repository\HouseRepository;
use App\Repository\MediaRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminMediaController extends AbstractController
{

    /**
     * @Route("/admin/media", name="admin.media.index")
     * @param MediaRepository $repository
     * @return Response
     */
    public function index (MediaRepository $repository) {
        $medias = $repository->findAll();

        return $this->render('admin/media/index.html.twig', [
            'medias' => $medias
        ]);
    }

    /**
     * @Route("/admin/media/create", name="admin.media.create")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return RedirectResponse|Response
     *
     * @throws Exception
     */
    public function form (Request $request, EntityManagerInterface $manager) {
        $media = new Media();

        $mediaForm = $this->createForm(MediaType::class, $media);
        $mediaForm->handleRequest($request);

        if ($mediaForm->isSubmitted() && $mediaForm->isValid()) {

            $manager->persist($media);
            $manager->flush();

            $this->addFlash('success', 'admin.media.created');
            return $this->redirectToRoute('admin.media.index');
        }

        return $this->render('admin/media/form.html.twig', [
           'form' => $mediaForm->createView(),
        ]);
    }

    /**
     * @Route("/admin/media/{id}", name="admin.media.delete", methods="DELETE")
     *
     * @param Media $media
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete (Media $media, EntityManagerInterface $manager, Request $request) {
        $isCsrfValid = $this->isCsrfTokenValid(
            'delete' . $media->getId(),
            $request->get('_token')
        );

        if (!$isCsrfValid) {
            $this->addFlash('danger', "Le jeton CSRF n'est pas valide.");
            return $this->redirectToRoute('admin.media.index');
        }

        $manager->remove($media);
        $manager->flush();

        $this->addFlash('success', 'Le media a été supprimé.');

        return $this->redirectToRoute('admin.media.index');
    }
}
