<?php

namespace App\Controller;
use App\Form\ClassType;
use App\Entity\Classes;
use App\Entity\Student;
use App\Repository\ClassesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;   
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
        return $this->render('main/index.html.twig', []);
    }

  

}