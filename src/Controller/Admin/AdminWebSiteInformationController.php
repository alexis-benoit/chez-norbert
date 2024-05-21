<?php

namespace App\Controller\Admin;

use App\Entity\WebSiteInformation;
use App\Form\InfoType;
use App\Repository\WebSiteInformationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @IsGranted("ROLE_USER")
 */
#[IsGranted("ROLE_USER")]
class AdminWebSiteInformationController extends AbstractController
{
    /**
     * @Route("/admin/info/create", name="admin.info.create")
     * @Route("/admin/info/edit", name="admin.info.update", methods="GET|POST")
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param WebSiteInformationRepository $repository
     * @return Response
     */
    #[Route("/admin/info/create", name: "admin.info.create")]
    #[Route("/admin/info/edit", name: "admin.info.update", methods: [ "GET", "POST" ])]
    public function create(Request $request,  EntityManagerInterface $manager, WebSiteInformationRepository $repository)
    {
        $info = $repository->findOne();

        $creation = !$info;

        if (!$info) {
            $info = new WebSiteInformation();
        }

        $form = $this->createForm(InfoType::class, $info, [
            'edit' => !!$info->getId(),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($info);
            $manager->flush();

            $this->addFlash('success', $creation ? 'admin.info.created' : 'admin.info.updated');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/info/form.html.twig', [
            'form' => $form->createView(),
            'info' => $info
        ]);
    }
}
