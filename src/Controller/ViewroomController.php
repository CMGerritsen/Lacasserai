<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewroomController extends AbstractController
{
    /**
     * @Route("/viewroom", name="viewroom", methods={"POST"})
     */
    public function index()
    {
        $BeginDate = $_POST["BeginDate"];
        $EndDate = $_POST["EndDate"];

        $booking = $this->getDoctrine()
            ->getRepository(Booking::class)
            ->getBetween(array($BeginDate, $EndDate));

        $input = array();
        for ($x = 0; $x < count($booking); $x++) {
            array_push($input, $booking[$x][1]);
        }

        $available = $this->getDoctrine()
            ->getRepository(Room::class)
            ->notIn($input);

        return $this->render('viewroom/index.html.twig', [
            'room' => $available,
        ]);
    }
}
