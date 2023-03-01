<?php

namespace App\Controller;

use App\Repository\ScoresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    /**
     * @Route("/Score/{id}", name="Student_Score")
     */
    public function StudentScore(ScoresRepository $repo,String $id): Response
    {
        $Score = $repo->findByCampusField($id);
        return $this->render('Class/index.html.twig', [
             'controller_name' => 'MainController',
             'Classes' => $Score
        ]);
    }
}
