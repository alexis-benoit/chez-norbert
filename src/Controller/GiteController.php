<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Form\GiteFormType;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GiteController extends AbstractController
{
    /**
     * @Route({
     * "fr": "/creerGite",
     * "en": "/createGite"
     * }, name="gite")
     * @param Request $request
     * @param GiteRepository $repository
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function create(Request $request, GiteRepository $repository, EntityManagerInterface $manager)
    {
        $gites = new Gite();

        $form = $this->createForm(GiteFormType::class, $gites);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            return $this->redirectToRoute('home.index');
        }

        //TODO: use gite view instead of test view
        return $this->render('test/gites.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
