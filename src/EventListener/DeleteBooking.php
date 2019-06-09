<?php


namespace App\EventListener;

use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\Event;

class DeleteBooking extends Event
{
//    protected $em;
//    public function __construct(EntityManager $em)
//    {
//        $this->em = $em;
//    }
    
    public function DeleteBooking(BookingRepository $bookingRepository, EntityManager $entityManager)
    {
        if(!empty($bookingRepository->findAll())) {
            $current_date = new \DateTime('00:00:00.000000');
            $booking = $bookingRepository->findOneBy(['checkoutDate' => $current_date]);
            $booking_id = $booking->getId();
            $room = $entityManager->getRepository('App:Room')->find($booking_id);

            if ($current_date == $booking->getCheckoutDate()) {
                $room->setAvailable(1);
                $entityManager->persist($room);
                $entityManager->remove($booking);
                $entityManager->flush();
            }
        }
    }
}