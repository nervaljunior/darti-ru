<?php

namespace App\Repository;

use App\Entity\Avaliacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Avaliacao>
 *
 * @method Avaliacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avaliacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avaliacao[]    findAll()
 * @method Avaliacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvaliacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avaliacao::class);
    }

//    /**
//     * @return Avaliacao[] Returns an array of Avaliacao objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Avaliacao
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
