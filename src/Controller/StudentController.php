<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\Subject;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    private StudentRepository $repo;
    
    public function __construct(StudentRepository $repo)
        {
           $this->repo = $repo;
        }

  

    /**
    * @Route("/listsd", name="list_student")
    */
    public function listStudent(StudentRepository $repo): Response
    {    
         $student = $repo->findAll();
        return $this->render('student/view.html.twig', [
             'Student' => $student
        ]);
    }
    
   /**
    * @Route("/addstudent", name="student_add")
    */
   public function addstudent(Request $req , StudentRepository $repo): Response
   {
    $st = new Student();
        $form = $this->createForm(StudentType::class, $st);
        
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
          $repo->save($st,true);
          return $this->redirectToRoute('list_student', [], Response::HTTP_SEE_OTHER);
     
        }
       
        return $this->render("student/form.html.twig",[
            'form' => $form->createView(),
    
        ]);
   }

         /**
     * @Route("/editstudent/{id}", name="student_edit",requirements={"id"="\d+"})
     */
    public function editstudent(Request $req, Student $e): Response
    {
           
        $form = $this->createForm(StudentType::class, $e);   
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            $this->repo->save($e,true);
            return $this->redirectToRoute('list_student', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("student/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
    /**
    * @Route("/deletestudent/{id}",name="student_delete",requirements={"id"="\d+"})
    */
    
     public function deletestudent(Request $request, Student $st): Response
     {
         $this->repo->remove($st,true);
         return $this->redirectToRoute('list_student', [], Response::HTTP_SEE_OTHER);
     }

  
   
}

