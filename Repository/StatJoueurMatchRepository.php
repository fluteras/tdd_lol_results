<?php

namespace App\Repository;

use App\Entity\StatJoueurMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StatJoueurMatch>
 *
 * @method StatJoueurMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatJoueurMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatJoueurMatch[]    findAll()
 * @method StatJoueurMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatJoueurMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatJoueurMatch::class);
    }

//    /**
//     * @return StatJoueurMatch[] Returns an array of StatJoueurMatch objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StatJoueurMatch
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
