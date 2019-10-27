<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\House;
use App\Form\BookingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    /**
     * @Route("/booking/{id}", name="booking.index")
     * @param Request $request
     * @param House $house
     * @return Response
     */
    public function index(Request $request, House $house)
    {
        $booking = new Booking();
        $bookingForm = $this->createForm(BookingType::class, $booking);

        $bookingForm->handleRequest($request);

        if ($bookingForm->isSubmitted() && $bookingForm->isValid()) {
            return $this->redirect(
                $request->headers->get('referer') ?? '/'
            );
        }

        return $this->render ('booking/index.html.twig', [
           'form' => $bookingForm->createView()
        ]);
    }
}
