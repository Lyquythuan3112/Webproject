<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'student_show')]
    public function index(StudentRepository $repo): Response
    {
      $Dateofbirth = $repo->findAll();

        $student = $repo->findAll();
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',

            'student' => $student,
            'Dateofbirth'=>$Dateofbirth,
        ]);
    }

    /**
     * @Route("/adds", name="add_student")
     */
    public function addAction(): Response
    {
        return $this->render('$0.html.twig', []);
    }

    /**
     * @Route("/edits/{id}", name="edit_student", requirements={"id"="\d+"})
     */
    public function editAction(): Response
    {
        return $this->render('$0.html.twig', []);
    }

    /**
     * @Route("/deletes/{id}", name="delete_student", requirements={"id"="\d+"})
     */
    public function deleteAction(): Response
    {
        return $this->render('$0.html.twig', []);
    }
}

