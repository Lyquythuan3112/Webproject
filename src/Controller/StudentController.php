<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Entity\Student;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
   
    
   /**
    * @Route("/student", name="student_show")
    */
   public function FunctionName(StudentRepository $repo): Response
   {
    $Dateofbirth = $repo->findAll();

    $student = $repo->findAll();
    return $this->render('student/index.html.twig', [
        'controller_name' => 'StudentController',

        'student' => $student,
        'Dateofbirth'=>$Dateofbirth,
    ]);
   }
}

