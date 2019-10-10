<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactFormType;

class HomeController extends AbstractController
{
    /**
     * @Route({
     *  "fr": "/",
     *  "en": "/"
     * }, name="home.index")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
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
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($contact);
        }

        return $this->render ('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
