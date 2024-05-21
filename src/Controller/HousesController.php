<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\House;
use App\Form\BookingType;
use App\Repository\HouseRepository;
use App\Repository\WebSiteInformationRepository;
use App\Services\CaptchaVerifier;
use App\Services\CaptchaVerifierInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HousesController extends AbstractController
{
    /**
     * @Route("/houses/{slug}", name="houses.get")
     *
     * @param House $house
     * @param HouseRepository $repository
     * @param Swift_Mailer $mailer
     * @param Request $request
     * @param CaptchaVerifierInterface $verifier
     * @param WebSiteInformationRepository $informationRepository
     * @return Response
     */
    #[Route("/houses/{slug}", name: "houses.get")]
    public function index(House $house, HouseRepository $repository, MailerInterface $mailer,Request $request, CaptchaVerifierInterface $verifier, WebSiteInformationRepository $informationRepository)
    {
        //$anotherHouse = $repository->findAnotherHouse($house);
        $anotherHouses = $repository->findAnotherHouses($house);
        //$oppositeTypeHouses = $repository->findOppositeTypeHouses ($house);
        $oppositeTypeHouse = $repository->findOneOppositeTypeHouses ($house);

        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $verifier->verify($request->get('g-recaptcha-response'))) {
            $message = (new Email())
                ->from($booking->getEmail())
                ->to($informationRepository->findOne()->getEmail())
                ->html(
                    $this->renderView('mails/booking.html.twig', [
                        'booking' => $booking,
                        'house' => $house
                    ]),
                    'text/html'
                );

            $mailer->send($message);


            $this->addFlash('success', 'Votre demande a bien été prise en compte.');
            return $this->redirectToRoute('houses.get', [ 'slug' => $house->getSlug() ]);
        }

        if ($form->isSubmitted() &&  $form->isValid() && !$verifier->verify($request->get('g-recaptcha-response'))) {
            $this->addFlash('danger', 'Captcha obligatoire');
        }

        return $this->render('houses/index.html.twig', [
            'house' => $house,
            //'anotherHouse' => $anotherHouse,
            'anotherHouses' => $anotherHouses,
            //'oppositeTypeHouses' => $oppositeTypeHouses
            'oppositeTypeHouse' => $oppositeTypeHouse,
            'form' => $form->createView(),
        ]);
    }
}