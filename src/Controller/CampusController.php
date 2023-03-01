<?php

namespace App\Controller;

use App\Repository\CampusRepository;
use App\Repository\ClassesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusController extends AbstractController
{
    // /**
    //  * @Route("/Campus", name="campus_page")
    //  */
    // public function campusPage(CampusRepository $campus): Response
    // {
        
    //     $campus = $campus->findAll();
    //     return $this->render('campus/index.html.twig', [
    //         'Campus' => $campus 
    //     ]);
    // }

    /**
    * @Route("/Campus/{id}", name="Campus_show")
    */
   public function campusshow(ClassesRepository $repo,string $id): Response
   {
     
        $Classes = $repo->findByCampusField($id);
       return $this->render('Class/index.html.twig', [
            'controller_name' => 'MainController',
            'Classes' => $Classes
       ]);
   }   

}
