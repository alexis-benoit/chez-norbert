<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ContactController extends AbstractController
{
    /**
     * //TODO utiliser cette route pour contacts
     * @Route({
     * "fr": "/contact2",
     * "en": "/contact2"
     * }, name="app_contact")
     */
    public function new(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            return $this->redirectToRoute('home.index');
        }

        //TODO: use contact view instead of test view
        return $this->render('test/contact.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
