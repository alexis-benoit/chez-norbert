<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     *
     * @param Request $request
     * @param PasswordHasherInterface $passwordEncoder
     * @param UserRepository $repository
     * @param EntityManagerInterface $manager
     *
     * @return Response
     */
    #[Route("/register", name: "app_register")]
    public function register(Request $request, UserPasswordHasherInterface $passwordEncoder, UserRepository $repository, EntityManagerInterface $manager): Response
    {
        if ($repository->getCount() > 0){
            return $this->redirectToRoute('app_login');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $plainPassword = $form->get('plainPassword')->getData();
            $encodedPassword = $passwordEncoder->hashPassword($user, $plainPassword);

            $user
                ->setPassword($encodedPassword)
                ->setRoles([ 'ROLE_ADMIN' ]);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
