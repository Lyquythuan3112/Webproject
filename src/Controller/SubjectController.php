<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Form\SubjectType;
use App\Repository\SubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubjectController extends AbstractController
{
    private SubjectRepository $repo;
    
public function __construct(SubjectRepository $repo)
    {
       $this->repo = $repo;
    }

    /**
     * @Route("/listsub", name="list_subject")
     */
    public function listSubject(SubjectRepository $repo): Response
    {
        $subject = $repo->findAll();
        return $this->render('subject/view.html.twig', [
            'Subject' => $subject
        ]);
    }


   /**
    * @Route("/addsub", name="subject_show")
    */
    public function createAction(Request $req , SubjectRepository $repo): Response
   {
    $d = new Subject();
    $form = $this->createForm(SubjectType::class, $d);

    $form->handleRequest($req);
    if($form->isSubmitted()&&$form->isValid()){
        $repo->save($d,true);
        return $this->redirectToRoute('list_subject', [], Response::HTTP_SEE_OTHER);

    }
        return $this->render('subject/form.html.twig', [
            'form' => $form->createView()
    ]);
    }
         /**
     * @Route("/editsub/{id}", name="subject_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Subject $d): Response
    {
           
        $form = $this->createForm(SubjectType::class, $d);   
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

      
            $this->repo->save($d,true);
            return $this->redirectToRoute('list_subject', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("Subject/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
        /**
     * @Route("/deletesub/{id}",name="subject_delete",requirements={"id"="\d+"})
     */
    
     public function deletesubject(Subject $id): Response
     {  
         $this->repo->remove($id,true);
         return $this->redirectToRoute('list_subject', [], Response::HTTP_SEE_OTHER);
        

     }
    }
    
