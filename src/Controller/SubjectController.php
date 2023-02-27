<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Form\SubjectType;
use App\Repository\SubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class SubjectController extends AbstractController
{
   
    private SubjectRepository $repo;
    public function __construct( SubjectRepository $repo)
    {
       $this->repo = $repo;
    }
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
}

