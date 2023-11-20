<?php

namespace App\Repository;

use App\Entity\JoueurRoster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JoueurRoster>
 *
 * @method JoueurRoster|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoueurRoster|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoueurRoster[]    findAll()
 * @method JoueurRoster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueurRosterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoueurRoster::class);
    }

//    /**
//     * @return JoueurRoster[] Returns an array of JoueurRoster objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JoueurRoster
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
