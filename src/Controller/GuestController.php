<?php

namespace App\Controller;

use App\Repository\CampusRepository;
use App\Repository\ClassesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuestController extends AbstractController
{
   /**
    * @Route("/homepage", name="guest")
    */
   public function guestmain(CampusRepository $repo): Response
   {
     
        $Campus = $repo->findAll();
       return $this->render('Campus/index.html.twig', [
            'controller_name' => 'MainController',
            'Campus' => $Campus
       ]);
   }    
}
