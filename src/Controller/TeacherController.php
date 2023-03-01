<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\TeacherType;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    private TeacherRepository $repo;
    public function __construct(TeacherRepository $repo)
    {
        $this->repo =$repo;
    }
    /**
     * @Route("/teacher", name="app_teacher")
     */
    public function index(): Response
    {
        return $this->render('teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }


    /**
     * @Route("/listteacher", name="list_teacher")
     */
    public function listteacher(TeacherRepository $repo): Response
    {
        $Teacher = $repo->findAll();
        return $this->render('teacher/view.html.twig', [
            'Teacher' => $Teacher
        ]);
    }

    /**
     * @Route("/adddteacher", name="add_teahcer")
     */
    public function addTeacher(Request $req, TeacherRepository $repo): Response
    {   
        $Teacher = new Teacher();
        $form = $this->createForm(TeacherType::class, $Teacher);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $repo->save($Teacher,true);
            return $this->redirectToRoute('list_teacher', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('teacher/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/editteacher/{id}", name="edit_teacher")
     */
    public function editTeacher(Request $req, Teacher $Teacher): Response
    {
        $form = $this->createForm(TeacherType::class, $Teacher);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->save($Teacher,true);
            return $this->redirectToRoute('list_teacher', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('teacher/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/deleteteacher/{id}", name="delete_teacher")
     */
    public function deleteTeacher(Request $request, Teacher $Teacher): Response
    {
        $this->repo->remove($Teacher,true);
        return $this->redirectToRoute('list_teacher', [], Response::HTTP_SEE_OTHER);
    }
}
