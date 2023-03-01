<?php

namespace App\Repository;

use App\Entity\Classes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CLasses>
 *
 * @method Classes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Classes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Classes[]    findAll()
 * @method Classes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Classes::class);
    }

    public function save(Classes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Classes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

       /**
        * @return classes[] Returns an array of Car objects
       */
   public function findByCampusField($id): array
   {
    return $this->createQueryBuilder('ca')
               ->andWhere('ca.CampusName = :val')
               ->setParameter('val', $id)
               ->orderBy('ca.CampusName')
               ->orderBy('ca.Type')
               ->getQuery()
               ->getResult()    
           ;
   }

//    /**
//     * @return Classes[] Returns an array of CLasses objects
//     */
//    public function findByMakeField($id): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.id = :val')
//            ->setParameter('val', $id)
//            ->orderBy('c.id')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CLasses
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
