<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Repository\ClassesRepository;
use MainType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private  $repo;
    public function __construct(ClassesRepository $repo)
   {
      $this->repo = $repo;
   }
    #[Route('/admin', name: 'Main')]
    public function index(Request $req): Response
    {
       
        $p = new Classes();
        $Form = $this->createForm(MainType ::class, $p);
        $Form->handleRequest($req);
    
            $this->repo->save($p,true);
            return $this->redirectToRoute('app_guest', [], Response::HTTP_SEE_OTHER);
        
        return $this->render("main/form.html.twig",[
            'form' => $Form->createView()
        ]);
    }
}