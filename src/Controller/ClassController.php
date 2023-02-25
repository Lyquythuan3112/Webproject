<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassController extends AbstractController
{
    #[Route('/class', name: 'app_class')]
    public function index(): Response
    {
        return $this->render('guest/index.html.twig', [
            'controller_name' => 'ClassController',
        ]);
    }
}
