<?php

namespace App\Controller;

use App\Repository\WebSiteInformationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class WebSiteInformationController extends AbstractController
{
    /**
     * @Route("/information", name="information")
     * @param Request $request
     * @param WebSiteInformationRepository $repository
     * @param EntityManagerInterface $manager
     * @param SerializerInterface $serializer
     * @return Response
     */
    #[Route("/information", name: "information")]
    public function getInformation(Request $request, WebSiteInformationRepository $repository, EntityManagerInterface $manager, SerializerInterface $serializer)
    {
        $Object = $repository->findOne();

        $json = $serializer->serialize($Object, 'json');

        $response = new Response();
        $response->setContent($json);

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
