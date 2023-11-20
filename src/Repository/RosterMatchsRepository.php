<?php

namespace App\Repository;

use App\Entity\Equipe;
use App\Entity\RosterMatchs;
use App\Entity\Tournoi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RosterMatchs>
 *
 * @method RosterMatchs|null find($id, $lockMode = null, $lockVersion = null)
 * @method RosterMatchs|null findOneBy(array $criteria, array $orderBy = null)
 * @method RosterMatchs[]    findAll()
 * @method RosterMatchs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RosterMatchsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RosterMatchs::class);
    }

    // public function findRosterMatchsByEquipe(Equipe $equipe): array
    // {
    //     return $this->createQueryBuilder('victoires')
    //             ->from('RosterMatchs', 'participe')
    //             ->join('Roster', 'rosters')
    //             ->join('Equipe', 'equipes')
    //             ->where('equipes.id = :id_equipe')
    //             ->setParameter('id_equipe', $equipe->getId())
    //             ->getQuery()
    //             ->getResult();
    // }
    
    // public function findRosterMatchsByTournoi(Tournoi $tournoi): array
    // {
    //     return $this->createQueryBuilder('victoires')
    //             ->from('RosterMatchs', 'participe')
    //             ->join('Matchs', 'matchs')
    //             ->join('Tournoi', 'tournois')
    //             ->where('tournois.id = :id_tournoi')
    //             ->setParameter('id_tournoi', $tournoi->getId())
    //             ->getQuery()
    //             ->getResult();
    // }

    // public function findRosterMatchsByEquipeAndTournoi(Equipe $equipe, Tournoi $tournoi): array
    // {

    // }
}
