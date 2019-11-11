<?php

namespace App\Repository;

use App\Entity\WebSiteInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method WebSiteInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebSiteInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebSiteInformation[]    findAll()
 * @method WebSiteInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebSiteInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebSiteInformation::class);
    }

    public function findOne(): ?WebSiteInformation
    {
        return $this->createQueryBuilder('w')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function getCount()
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    // /**
    //  * @return WebSiteInformation[] Returns an array of WebSiteInformation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WebSiteInformation
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
