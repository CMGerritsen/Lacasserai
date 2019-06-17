<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CheckInListController extends AbstractController
{
    /**
     * @Route("/checkinlist", name="check_in_list")
     */
    public function index()
    {
        $current_date = new \DateTime();

        $em = $this->getDoctrine()->getManager();
        $booking = $em->getRepository('App:Booking')->findBy(['checkinDate' => $current_date]);
        $booking2 = $em->getRepository('App:Booking')->findBy(['checkoutDate' => $current_date]);

        return $this->render('check_in_list/index.html.twig', [
            'booking' => $booking,
            'booking2' => $booking2,
            'controller_name' => 'CheckInListController',
        ]);
    }
}
