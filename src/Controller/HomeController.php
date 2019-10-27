<?php

namespace App\Controller;

use App\Repository\HouseRepository;
use App\Repository\WebSiteInformationRepository;
use Swift_Mailer;
use Swift_Message;
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
        $rooms = $repository->findAllByType(1);
        $houses = $repository->findAllByType(0);

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
     *
     * @param Request $request
     * @param Swift_Mailer $mailer
     *
     * @param WebSiteInformationRepository $repository
     * @return Response
     */
    public function contact (Request $request, Swift_Mailer $mailer, WebSiteInformationRepository $repository)
    {
        $contact = new Contact ();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = (new Swift_Message())
                ->setFrom($contact->getEmail())
                ->setTo($repository->findOne()->getEmail())
                ->setBody(
                    $this->renderView('mails/contact.html.twig', [
                        'contact' => $contact
                    ]),
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('success', 'Le message a bien été envoyé');
            return $this->redirectToRoute('home.contact');
        }

        return $this->render ('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
