<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class AdminUserController extends AbstractController implements AdminControllerInterface
{
    /**
     * @Route("/admin/user", name="admin.user.index")
     * @param UserRepository $repository
     * @return Response
     */
    public function index (UserRepository $repository) {
        $users = $repository->findAll();

        return $this->render('admin/user/index.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/admin/user/create", name="admin.user.create")
     * @Route("/admin/user/{id}", name="admin.user.update", methods="GET|POST")
     *
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param UserRepository $repository
     * @param EntityManagerInterface $manager
     * @param User|null $user
     * @return Response
     */
    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder, UserRepository $repository, EntityManagerInterface $manager, User $user = null)
    {
        $creation = !$user;

        if (!$user) {
            $user = new User();
        }

        $form = $this->createForm(RegistrationFormType::class, $user, [
            'edit' => !!$user->getId(),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);

            $user
                ->setPassword($encodedPassword);

            $manager->persist($user);
            $manager->flush();
            $this->addFlash('success', $creation ? 'admin.user.created' : 'admin.user.updated');
            return $this->redirectToRoute('admin.user.index');
        }

        return $this->render('admin/user/form.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    /**
     * @Route("/admin/user/{id}", name="admin.user.delete", methods="DELETE")
     *
     * @param User $user
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete (User $user, EntityManagerInterface $manager, Request $request) {
        $isCsrfValid = $this->isCsrfTokenValid(
            'delete' . $user->getId(),
            $request->get('_token')
        );

        if (!$isCsrfValid) {
            $this->addFlash('danger', "admin.csrf.invalid");
            return $this->redirectToRoute('admin.user.index');
        }

        $manager->remove($user);
        $manager->flush();

        $this->addFlash('success', 'admin.user.deleted');
        return $this->redirectToRoute('admin.user.index');
    }
}
