<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Form\ClassType;
use App\Repository\ClassesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassController extends AbstractController
{
    private ClassesRepository $repo;
    public function __construct(ClassesRepository $repo)
    {
        $this->repo = $repo;        
    }
    
    #[Route('/class', name: 'class_view')]
    public function index(ClassesRepository $repo): Response
    {
        $Classes = $repo->findAll();
        return $this->render('class/view.html.twig', [
            'controller_name' => 'ClassController',
            'Classes' => $Classes
        ]);
    }

/**
 * @Route("/listc", name="list_class")
 */
public function listclass(ClassesRepository $repo): Response
{
    $Classes = $repo->findAll();
    return $this->render('class/view.html.twig', [
        'Classes' => $Classes
    ]);
}

      /**
     * @Route("/addc", name="add_class")
     */
    public function Addclass(Request $req , ClassesRepository $repo): Response
    {
        
        $c = new Classes();
        $form = $this->createForm(ClassType ::class, $c);
        
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
          $repo->save($c,true);
          return $this->redirectToRoute('guest', [], Response::HTTP_SEE_OTHER);
     
        }
       
        return $this->render("class/form.html.twig",[
            'form' => $form->createView(),
    
        ]);
    }
    /**
     * @Route("/editclass/{id}", name="edit_class", requirements={"id"="\d+"})
     */
    public function Editclass(Request $req, Classes $class): Response
    {  
    
        $form = $this->createForm(ClassType::class, $class);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->save($class,true);
            return $this->redirectToRoute('list_class', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('class/form.html.twig', [
            'form'=> $form->createView(),
        ]);
    }

    /**
     * @Route("/deleteClass/{id}", name="delete_class")
     */
    public function deleteAction(Request $request, Classes $c): Response
    {   
        $this->repo->remove($s,true);
        return $this->redirectToRoute('.html.twig', []);
    }

}
