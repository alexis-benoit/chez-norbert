<?php

namespace App\Controller;

use App\Entity\House;
use App\Repository\HouseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HousesController extends AbstractController
{
    /**
     * @Route("/houses/{slug}", name="houses.get")
     *
     * @param House $house
     * @param HouseRepository $repository
     * @return Response
     */
    public function index(House $house, HouseRepository $repository)
    {
        //$anotherHouse = $repository->findAnotherHouse($house);
        $anotherHouses = $repository->findAnotherHouses($house);
        //$oppositeTypeHouses = $repository->findOppositeTypeHouses ($house);
        $oppositeTypeHouse = $repository->findOneOppositeTypeHouses ($house);

        return $this->render('houses/index.html.twig', [
            'house' => $house,
            //'anotherHouse' => $anotherHouse,
            'anotherHouses' => $anotherHouses,
            //'oppositeTypeHouses' => $oppositeTypeHouses
            'oppositeTypeHouse' => $oppositeTypeHouse
        ]);
    }
}