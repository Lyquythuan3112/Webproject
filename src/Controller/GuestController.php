<?php

namespace App\Controller;

use App\Repository\CampusRepository;
use App\Repository\ClassesRepository;
use App\Repository\StudentRepository;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuestController extends AbstractController
{
   /**
    * @Route("/homepage", name="guest")
    */
   public function guestmain(CampusRepository $repo): Response
   {
     
        $Campus = $repo->findAll();
       return $this->render('Campus/index.html.twig', [
            'controller_name' => 'MainController',
            'Campus' => $Campus
       ]);
   }    
    /**
    * @Route("/student/{id}", name="student_show", methods="GET",requirements={"id"="\d+"})
    */
    public function TeacherviewGuest(StudentRepository $repo,String $id): Response
    {
     $student = $repo->findByMakeField($id);
     return $this->render('student/index.html.twig', [
         'controller_name' => 'StudentController',
         'student' => $student,      
         
     ]);
    }

    /**
    * @Route("/teacher/{id}", name="teacher_show", methods="GET",requirements={"id"="\d+"})
    */
    public function studentviewGuest(TeacherRepository $repo,String $id): Response
    {
          $Teacher = $repo->findByTeacherField($id);
     return $this->render('Teacher/index.html.twig', [
         'controller_name' => 'StudentController',
         'Teacher' => $Teacher,      
       
     ]);
    }
}
