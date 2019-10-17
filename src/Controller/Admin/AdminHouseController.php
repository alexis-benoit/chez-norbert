<?php

namespace App\Controller\Admin;

use App\Entity\House;
use App\Form\HouseType;
use App\Repository\HouseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class AdminHouseController extends AbstractController
{
    /**
     * @Route({
     * "fr": "admin/house",
     * "en": "admin/house"
     * }, name="house.index")
     *
     * @param HouseRepository $houseRepository
     * @param Request $request
     *
     * @return Response
     */
    public function index(HouseRepository $houseRepository, Request $request)
    {
        $houses =  $houseRepository->FindAll();

        return $this->render('test/house_index.html.twig', [
            'houses' => $houses
        ]);
    }

    /**
     * @Route({
     * "fr": "admin/house/creation",
     * "en": "admin/house/create"
     * }, name="house.create")
     * @Route({
     * "fr": "admin/house/{id}",
     * "en": "admin/house/{id}"
     * }, name="house.edit", methods="GET|POST")
     * @param Request $request
     * @param HouseRepository $repository
     * @param EntityManagerInterface $manager
     * @param House|null $gites
     * @return Response
     */
    public function create(Request $request, HouseRepository $repository, EntityManagerInterface $manager, House $gites = null)
    {
        if (!$gites) {
            $gites = new House();
        }

        $form = $this->createForm(HouseType::class, $gites, [
            'edit' => !!$gites->getId(),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $manager->persist($gites);
            $manager->flush();
            return $this->redirectToRoute('home.index');
        }

        //TODO: use gite view instead of test view
        return $this->render('test/gites.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route({
     * "fr": "admin/house/{id}",
     * "en": "admin/house/{id}"
     * }, name="house.delete", methods="DELETE")
     * @param House $gites
     * @param Request $request
     * @param EntityManagerInterface $manager
     *
     * @return RedirectResponse
     */
    public function delete (House $gites, Request $request, EntityManagerInterface $manager) {
        $manager->remove($gites);
        $manager->flush();

        //TODO: redirect to house index quand elle sera faite
        //return $this->redirectToRoute('house.index');
        return $this->redirectToRoute('home.index');
    }
}
