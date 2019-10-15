<?php

namespace App\Controller;

use App\Entity\House;
use App\Form\HouseFormType;
use App\Repository\HouseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HouseController extends AbstractController
{
    /**
     * @Route({
     * "fr": "/creerHouse",
     * "en": "/createHouse"
     * }, name="gite")
     * @param Request $request
     * @param HouseRepository $repository
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function create(Request $request, HouseRepository $repository, EntityManagerInterface $manager)
    {
        $gites = new House();

        $form = $this->createForm(HouseFormType::class, $gites);

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
