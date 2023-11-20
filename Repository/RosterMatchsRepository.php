<?php

namespace App\Repository;

use App\Entity\RosterMatchs;
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

//    /**
//     * @return RosterMatchs[] Returns an array of RosterMatchs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RosterMatchs
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
