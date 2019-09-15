<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     *
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param UserRepository $repository
     * @param EntityManagerInterface $manager
     *
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, UserRepository $repository, EntityManagerInterface $manager): Response
    {
        if ($repository->getCount() > 0){
            //TODO Rediriger ves page login quand elle sera faite
            return $this->redirectToRoute('home.index');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $plainPassword = $form->get('plainPassword')->getData();
            $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);

            $user
                ->setPassword($encodedPassword)
                ->setRoles([ 'ROLE_ADMIN' ]);

            $manager->persist($user);
            $manager->flush();

            // TODO: When the user is created, redirect him to login page.
            return $this->redirectToRoute('home.index');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
