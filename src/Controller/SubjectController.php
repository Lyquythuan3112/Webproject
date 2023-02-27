<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Form\SubjectType;
use App\Repository\ClassesRepository;
use App\Repository\SubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class SubjectController extends AbstractController
{
   
    
   /**
    * @Route("/subject", name="subject_show")
    */
    public function createAction(Request $req , SubjectRepository $repo): Response
   {
    $d = new Subject();
    $form = $this->createForm(SubjectType ::class, $d);

    $form->handleRequest($req);
    if($form->isSubmitted()&&$form->isValid()){
        $repo->save($d,true);
        return $this->redirectToRoute('guest', [], Response::HTTP_SEE_OTHER);

    }
        return $this->render('subject/form.html.twig', [
    ]);
    }
}

