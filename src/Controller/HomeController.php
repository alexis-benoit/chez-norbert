<?php

namespace App\Controller;

use App\Repository\HouseRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactType;

class HomeController extends AbstractController
{
    /**
     * @Route({
     *  "fr": "/",
     *  "en": "/"
     * }, name="home.index")
     *
     * @param HouseRepository $repository
     * @return Response
     */
    public function index(HouseRepository $repository)
    {
        $rooms = $repository->findAllByType("Chambre d'hote");
        $houses = $repository->findAllByType('Gite');

        return $this->render('home/index.html.twig', [
            'rooms' => $rooms,
            'houses' => $houses
        ]);
    }



    /**
     * @Route({
     * "fr": "/a-propos",
     * "en": "/about"
     * }, name="home.about")
     */
    public function about()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            ]);
    }
    /**
     * @Route("/contact", name="home.contact")
     */
    public function contact (Request $request)
    {
        $contact = new Contact ();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($contact);
        }

        return $this->render ('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
