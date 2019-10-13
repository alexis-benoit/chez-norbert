<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HousesController extends AbstractController
{
    /**
     * @Route("/houses", name="houses.get")
     */
    public function index()
    {
        return $this->render('houses/index.html.twig');
    }
}
