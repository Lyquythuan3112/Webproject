<?php

namespace App\Controller;

use App\Repository\CampusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusController extends AbstractController
{
    /**
     * @Route("/Campus", name="campus_page")
     */
    public function campusPage(CampusRepository $campus): Response
    {
        
        $campus = $campus->findAll();
        return $this->render('campus/index.html.twig', [
            'Campus' => $campus 
        ]);
    }

}
