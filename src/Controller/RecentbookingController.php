<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecentbookingController extends AbstractController
{
    /**
     * @Route("/recentbooking", name="recentbooking")
     */
    public function index()
    {
//        $em = $this->getDoctrine()->getManager();

        return $this->render('recentbooking/index.html.twig', [
            'controller_name' => 'RecentbookingController',
        ]);
    }
}
