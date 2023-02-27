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
    public function __construct( SubjectRepository $repo)
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
    $form = $this->createForm(SubjectType ::class, $d);

    $form->handleRequest($req);
    if($form->isSubmitted()&&$form->isValid()){
        $repo->save($d,true);
        return $this->redirectToRoute('guest', [], Response::HTTP_SEE_OTHER);

    }
        return $this->render('subject/form.html.twig', [
    ]);
    }
         /**
     * @Route("/edit/{id}", name="subject_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, SubjectRepository $d): Response
    {
           
        $form = $this->createForm(SubjectType::class, $d);   
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

      
            $this->repo->save($d,true);
            return $this->redirectToRoute('product_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("Subject/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
        /**
     * @Route("/delete/{id}",name="subject_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Subject $p): Response
     {
         $this->repo->remove($p,true);
         return $this->redirectToRoute('Subject_show', [], Response::HTTP_SEE_OTHER);
     }
}

