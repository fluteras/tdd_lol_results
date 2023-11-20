<?php

namespace App\Controller;

use App\Repository\TestRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/results', name: 'app_show_result')]
    public function showResults(TestRepository $testRepository): Response
    {
        // get data from bdd
        $results = $testRepository->findBy(['id' => 2]);

        if($results === [])
        {
            throw new Exception("Erreur, les données recherchées n'existent pas.");
        }



        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
            'data' => $results,
        ]);
    }

}
