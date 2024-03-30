<?php

namespace App\Repository;

use App\Entity\House;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method House|null find($id, $lockMode = null, $lockVersion = null)
 * @method House|null findOneBy(array $criteria, array $orderBy = null)
 * @method House[]    findAll()
 * @method House[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HouseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, House::class);
    }

    public function getCount()
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findOneById($value): ?House
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findAllByType ($type)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.type = :type')
            ->setParameter('type', $type)
            ->getQuery()
            ->getResult();
    }

    public function findAnotherHouse (House $house)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.id != :id')
            ->andWhere('g.type = :type')
            ->setParameter('id', $house->getId())
            ->setParameter('type', $house->getType())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneOppositeTypeHouses(House $house)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.type != :type')
            ->setParameter('type', $house->getType())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAnotherHouses (House $house)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.id != :id')
            ->andWhere('g.type = :type')
            ->setParameter('id', $house->getId())
            ->setParameter('type', $house->getType())
            ->getQuery()
            ->getResult();
    }

    public function findOppositeTypeHouses(House $house)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.type != :type')
            ->setParameter('type', $house->getType())
            ->getQuery()
            ->getResult();
    }

    public function findOneByName($value): ?House
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.name = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    /**
    * @return House[] Returns an array of Gite objects
    */

    public function findByType($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.type = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Gite[] Returns an array of Gite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gite
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
