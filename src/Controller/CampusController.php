<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Form\CampusType;
use App\Repository\CampusRepository;
use App\Repository\ClassesRepository;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusController extends AbstractController
{

    private CampusRepository $repo;
    public function __construct(CampusRepository $repo)
    {
        $this->repo =$repo;
    }

    /**
    * @Route("/Campus/{id}", name="Campus_show")
    */
   public function campusshow(ClassesRepository $crepo,string $id): Response
   {
    
        $Classes = $crepo->findByCampusField($id);
       return $this->render('Class/index.html.twig', [
            'controller_name' => 'MainController',
            'Classes' => $Classes,
       ]);
   }
   
   /**
    * @Route("listcampus", name="list_campus")
    */
   public function listCampus(CampusRepository $repo): Response
   {
        $campus = $repo->findAll();
       return $this->render('campus/view.html.twig', [
        'campus' => $campus
       ]);
   }


   /**
    * @Route("/addcampus", name="add_campus")
    */
   public function addCampus(Request $req, CampusRepository $repo): Response
   {
        $campus = new Campus();
        $form = $this->createForm(CampusType::class, $campus);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $repo->save($campus,true);
            return $this->redirectToRoute('list_campus', [], Response::HTTP_SEE_OTHER);
        }
       return $this->render('Campus/form.html.twig', [
        'form' => $form->createView(),
       ]);
   }

   /**
    * @Route("/editcampus/{id}", name="edit_campus", requirements={"id"="\d+"})
    */
   public function editCampus(Request $req, Campus $campus): Response
   {
        $form = $this->createForm(CampusType::class, $campus);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->save($campus,true);
            return $this->redirectToRoute('list_campus', [], Response::HTTP_SEE_OTHER);
        }
       return $this->render('campus/form.html.twig', [
        'form' => $form->createView(),
       ]);
   }

   /**
    * @Route("/deletecampus/{id}", name="delete_campus")
    */
   public function deleteCampus(Request $request, Campus $campus): Response
   {
        $this->repo->remove($campus, true);
       return $this->redirectToRoute('list_campus', [], Response::HTTP_SEE_OTHER);
   }
}
