<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MyBookingController extends AbstractController
{
    /**
     * @Route("/mybooking", name="mybooking")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $user_id = $this->getUser()->getId();
        $myBooking = $em->getRepository('App:Booking')->findBy(array('user_id' => $user_id));

        return $this->render('my_booking/index.html.twig', [
            'myBooking' => $myBooking,
            'controller_name' => 'MyBookingController',
        ]);
    }
}
