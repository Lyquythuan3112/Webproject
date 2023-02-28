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
    
   /**
    * @Route("/addstu", name="student_show")
    */
   public function createAction(Request $req , StudentRepository $repo): Response
   {
    $d = new Subject();
    $form = $this->createForm(StudentType::class);

    $form->$form->handleRequest($req);
    if ($form->isSubmitted()) { 
        $repo->save($d,true);
        return $this->redirectToRoute('list_student',[],Response::HTTP_SEE_OTHER);
    }
       return $this->render('student/form.html.twig', [
        'form' => $form->createView(),
       ]);
   }

         /**
     * @Route("/edit/{id}", name="student_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, SubjectRepository $e): Response
    {
           
        $form = $this->createForm(StudentType::class, $e);   
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

      
            $this->repo->save($e,true);
            return $this->redirectToRoute('product_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("Subject/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
    /**
    * @Route("/delete/{id}",name="student_delete",requirements={"id"="\d+"})
    */
    
     public function deleteAction(Request $request, Subject $p): Response
     {
         $this->repo->remove($p,true);
         return $this->redirectToRoute('Subject_show', [], Response::HTTP_SEE_OTHER);
     }

  

   
}

