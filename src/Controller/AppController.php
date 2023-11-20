<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Tournoi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/app', name: 'app_app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
    // calcul KDA = 5*kill - 3*death + 2*assist 
    static public function calculkda($kills,$deaths,$assists): void
    {
        
    }
    // Retourne le nombre de victoires d'une équipe dans un tournoi
    static public function calculNbVictoires(Tournoi $tournoi, Equipe $equipe): void
    {
        
    }
}
