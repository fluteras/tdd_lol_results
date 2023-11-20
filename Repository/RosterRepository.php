<?php

namespace App\Repository;

use App\Entity\Roster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Roster>
 *
 * @method Roster|null find($id, $lockMode = null, $lockVersion = null)
 * @method Roster|null findOneBy(array $criteria, array $orderBy = null)
 * @method Roster[]    findAll()
 * @method Roster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RosterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Roster::class);
    }


    
}
