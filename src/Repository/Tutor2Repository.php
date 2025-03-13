<?php

namespace App\Repository;

use App\Entity\Tutor2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tutor2>
 *
 * @method Tutor2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tutor2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tutor2[]    findAll()
 * @method Tutor2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Tutor2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tutor2::class);
    }

//    /**
//     * @return Tutor2[] Returns an array of Tutor2 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tutor2
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
