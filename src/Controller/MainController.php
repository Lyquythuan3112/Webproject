<?php

namespace App\Controller;

use App\Repository\ClassesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;   
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private ClassesRepository $repo;
    public function __construct(ClassesRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/admin", name="admin")
     */
    public function adminPage(): Response
    {
        return $this->render('admin.html.twig', []);
    }
    /**
     * @Route("/", name="BasePage")
     */
    public function FunctionName(): Response
    {
        return $this->render('base.html.twig', []);
    }
  

}