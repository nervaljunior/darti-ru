<?php

namespace App\Repository;

use App\Entity\Cardapio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cardapio>
 *
 * @method Cardapio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cardapio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cardapio[]    findAll()
 * @method Cardapio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardapioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cardapio::class);
    }

//    /**
//     * @return Cardapio[] Returns an array of Cardapio objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cardapio
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
