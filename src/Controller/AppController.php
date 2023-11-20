<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Matchs;
use App\Entity\Tournoi;
use App\Repository\EquipeRepository;
use App\Repository\MatchsRepository;
use App\Repository\RosterMatchsRepository;
use App\Repository\RosterRepository;
use App\Repository\TournoiRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function PHPUnit\Framework\isNull;

class AppController extends AbstractController
{
    // Retourne le nb de victoires d'une équipe dans un tournoi
    static public function calculNbVictoires(Tournoi $tournoi, Equipe $equipe, RosterMatchsRepository $rosterMatchsRepository) : int
    {
        
        return 0;
    }

    #[Route('/results', name: 'app_show_result')]
    public function showResults(EquipeRepository $equipeRepository, 
    TournoiRepository $tournoiRepository, 
    RosterRepository $rosterRepository, 
    MatchsRepository $matchsRepository, 
    RosterMatchsRepository $rosterMatchsRepository
    ): Response
    {

        $equipe = $equipeRepository->findOneBy(['Nom' => 'T1']);    // get the equipe we search
        $tournoi = $tournoiRepository->findOneBy(['Nom' => 'Lyon Esport 2023']);    // get the tournoi we search
        
        $roster = $rosterRepository->findOneBy(['Equipe_ID' => $equipe->getId()]);  // get the roster of our equipe
        $matchs = $matchsRepository->findBy(['Tournoi_ID' => $tournoi->getId()]);   // get the list of matchs of our tournoi

        // get a list of all matchs id of our tournoi
        $matchsId = array_map(function (Matchs $match){
            return $match->getId();
        }, $matchs);

        // get all the victories of our selected roster in our list of matchs
        $victoires = $rosterMatchsRepository->findBy([
            'Roster_ID' => $roster->getId(),
            'Matchs_ID' => $matchsId,
            'Victorieux' => true
        ]);

        // dd($victoires);
        
        $results = [
            'tournoi_name' => $tournoi->getNom(),
            'equipes' => [
                [
                    'name' => $equipe->getNom(),
                    'victories_nb' => count($victoires)
                ]
            ]
        ];

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
