<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\House;
use App\Form\BookingType;
use App\Repository\HouseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HousesController extends AbstractController
{
    /**
     * @Route("/houses/{slug}", name="houses.get")
     *
     * @param House $house
     * @param HouseRepository $repository
     * @param Request $request
     * @return Response
     */
    public function index(House $house, HouseRepository $repository, Request $request)
    {
        //$anotherHouse = $repository->findAnotherHouse($house);
        $anotherHouses = $repository->findAnotherHouses($house);
        //$oppositeTypeHouses = $repository->findOppositeTypeHouses ($house);
        $oppositeTypeHouse = $repository->findOneOppositeTypeHouses ($house);

        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Votre demande a bien été prise en compte.');
        }

        return $this->render('houses/index.html.twig', [
            'house' => $house,
            //'anotherHouse' => $anotherHouse,
            'anotherHouses' => $anotherHouses,
            //'oppositeTypeHouses' => $oppositeTypeHouses
            'oppositeTypeHouse' => $oppositeTypeHouse,
            'form' => $form->createView(),
        ]);
    }
}