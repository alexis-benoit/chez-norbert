<?php

namespace App\Controller\Admin;

use App\Entity\House;
use App\Entity\Media;
use App\Form\HouseType;
use App\Form\MediaType;
use App\Repository\HouseRepository;
use Cocur\Slugify\SlugifyInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * @IsGranted("ROLE_USER")
 */
#[IsGranted("ROLE_USER")]
class AdminHouseController extends AbstractController implements AdminControllerInterface
{
    /**
     * @Route("/admin/house", name="admin.house.index")
     * @param HouseRepository $repository
     * @return Response
     */
    #[Route("/admin/house", name: "admin.house.index")]
    public function index (HouseRepository $repository) {
        $houses = $repository->findAll();

        return $this->render('admin/house/index.html.twig', [
            'houses' => $houses
        ]);
    }

    /**
     * @Route("/admin/house/create", name="admin.house.create")
     * @Route("/admin/house/{id}", name="admin.house.update", methods="GET|POST")
     *
     * @param Request $request
     * @param SlugifyInterface $slugifier
     * @param EntityManagerInterface $manager
     * @param House|null $house
     * @return Response
     */
    #[Route("/admin/house/create", name: "admin.house.create")]
    #[Route("/admin/house/{id}", name: "admin.house.update", methods: ["GET", "POST"])]
    public function create(Request $request, SlugifyInterface $slugifier, EntityManagerInterface $manager, House $house = null)
    {
        $creation = !$house;

        if (!$house) {
            $house = new House();
        }

        $form = $this->createForm(HouseType::class, $house, [
            'edit' => !!$house->getId(),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $slugifier->slugify($house->getName());
            $house->setSlug($slug);

            $manager->persist($house);
            $manager->flush();

            $this->addFlash('success', $creation ? 'admin.house.created' : 'admin.house.updated');
            return $this->redirectToRoute('admin.house.index');
        }

        return $this->render('admin/house/form.html.twig', [
            'form' => $form->createView(),
            'house' => $house,
            'mediaForm' => $creation ? null : $this->createForm(MediaType::class, null, [ 'action' => $this->generateUrl('api.admin.house.media.add', [ 'id' => $house->getId() ]) ])->createView()
        ]);
    }

    /**
     * @Route("/admin/house/{id}", name="admin.house.delete", methods="DELETE")
     *
     * @param House $house
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return RedirectResponse
     */
    #[Route("/admin/house/{id}", name: "admin.house.delete", methods: [ "DELETE" ])]
    public function delete (House $house, EntityManagerInterface $manager, Request $request) {
        $isCsrfValid = $this->isCsrfTokenValid(
            'delete' . $house->getId(),
            $request->get('_token')
        );

        if (!$isCsrfValid) {
            $this->addFlash('danger', "admin.csrf.invalid");
            return $this->redirectToRoute('admin.house.index');
        }

        $manager->remove($house);
        $manager->flush();

        $this->addFlash('success', 'admin.house.deleted');
        return $this->redirectToRoute('admin.house.index');
    }
}
