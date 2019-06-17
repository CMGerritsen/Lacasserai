<?php

namespace App\Controller;

use App\Entity\Betaal;
use App\Entity\Booking;
use App\Entity\Room;
use App\Form\BookingRoomType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookRoomController extends AbstractController
{
    /**
     * @Route("/bookroom/{id}", name="book_room")
     */
    public function index($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $room = $em->getRepository('App:Room')->findBy(array('id' => $id));
        $room_id = $em->getRepository('App:Room')->find($id);

        $book_room = new Booking();
        $form = $this->createForm(BookingRoomType::class, $book_room);
        $form->handleRequest($request);

        $betaal = new Betaal();

        if($form->isSubmitted() && $form->isValid()) {
            $user_id = $this->getUser()->getId();
            $user = $em->getRepository('App:User')->find($user_id);
            $book_room->setUserId($user);
            $book_room->setRoomId($room_id);
//            $room_id->setAvailable(0);
//            $betaal->setUser($user_id);

            $em->persist($book_room);
//            $em->persist($room_id);
//            $em->persist($betaal);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('book_room/index.html.twig', [
            'controller_name' => 'BookRoomController',
            'room' => $room,
            'form' => $form->createView()
        ]);
    }
}
