<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'student_show')]
    public function index(StudentRepository $repo): Response
    {
<<<<<<< HEAD
        $Dateofbirth = $repo->findAll();
=======
        
>>>>>>> 920856a14cd52fc86709894c3442961d3189c2df
        $student = $repo->findAll();
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',

            'student' => $student,
<<<<<<< HEAD
            'Dateofbirth' => $Dateofbirth
        ]);
        

    }
    /**
     * @Route("/add", name="add_student")
     */
    public function addAction(Request $req, ): Response
    {
        return $this->render('$0.html.twig', []);
=======
        ]);
>>>>>>> 920856a14cd52fc86709894c3442961d3189c2df
    }
}

