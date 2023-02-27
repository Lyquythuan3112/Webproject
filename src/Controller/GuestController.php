<?php

namespace App\Controller;

use App\Repository\ClassesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuestController extends AbstractController
{
   /**
    * @Route("/homepage", name="guest")
    */
   public function index(ClassesRepository $repo): Response
   {
        $Classes = $repo->findAll();
       return $this->render('guest/index.html.twig', [
            'controller_name' => 'MainController',
            'Classes' => $Classes
       ]);
   }    
}
