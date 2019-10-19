<?php

namespace App\Controller\Admin;

use App\Repository\HouseRepository;
use App\Repository\MediaRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_USER")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin.index")
     * @param HouseRepository $houseRep
     * @param MediaRepository $mediaRep
     * @param UserRepository $userRep
     * @return Response
     */
    public function index (HouseRepository $houseRep, MediaRepository $mediaRep, UserRepository $userRep) {
        $houses = $houseRep->getCount();
        $medias = $mediaRep->getCount();
        $users = $userRep->getCount();

        return $this->render('admin/index.html.twig', [
            'house_count' => $houses,
            'media_count' => $medias,
            'user_count' => $users
        ]);
    }

}
