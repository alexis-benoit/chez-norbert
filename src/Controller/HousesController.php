<?php

namespace App\Controller;

use App\Entity\House;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HousesController extends AbstractController
{
    /**
     * @Route("/houses/{id}", name="houses.get")
     *
     * @param House $house
     * @return Response
     */
    public function index(House $house)
    {
        return $this->render('houses/index.html.twig', [
            'house' => $house
        ]);
    }
}