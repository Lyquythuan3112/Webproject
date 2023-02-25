<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(StudentRepository $repo): Response
    {
        $student = $repo->findAll();
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
<<<<<<< HEAD
            'student' => $student
        ]);
=======
        ]); 
>>>>>>> db1e6b3c37b590b8005fe551deeacbe7c9001ddc
    }
}
