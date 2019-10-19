<?php

namespace App\Controller\Admin;

use App\Repository\HouseRepository;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin.index")
     * @param HouseRepository $houseRep
     * @param MediaRepository $mediaRep
     * @return Response
     */
    public function index (HouseRepository $houseRep, MediaRepository $mediaRep) {
        $houses = $houseRep->getCount();
        $medias = $mediaRep->getCount();

        return $this->render('admin/index.html.twig', [
            'house_count' => $houses,
            'media_count' => $medias
        ]);
    }

}
