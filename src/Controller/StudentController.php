<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
   
    
   /**
    * @Route("/student/{id}", name="student_show", methods="GET",requirements={"id"="\d+"})
    */
   public function FunctionName(StudentRepository $repo,String $id): Response
   {
    $student = $repo->findByMakeField($id);
    return $this->render('student/index.html.twig', [
        'controller_name' => 'StudentController',
        'student' => $student,      
        
    ]);
   }

   /**
    * @Route("/listsd", name="list_student")
    */
   public function listStudent(StudentRepository $repo): Response
   {    
        $student = $repo->findAll();
       return $this->render('student/view.html.twig', [
            'student' => $student
       ]);
   }

   
}

