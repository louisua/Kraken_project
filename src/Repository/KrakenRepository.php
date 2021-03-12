<?php

namespace App\Repository;

use App\Entity\Kraken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository; 
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Kraken|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kraken|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kraken[]    findAll()
 * @method Kraken[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KrakenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Kraken::class);
        $this->manager = $manager;
    }

    /**
     * save kraken
     */
    public function saveKraken($name, $age, $size, $weight)
    {
        $newKraken = new Kraken();

        $newKraken
            ->setName($name)
            ->setAge($age)
            ->setSize($size)
            ->setWeight($weight);

        $this->manager->persist($newKraken);
        $this->manager->flush();
    }


    /**
     * remove kraken
     */
    public function deleteKraken($id) {
        $this->manager->remove($id);
        $this->manager->flush();
    }


    // /**
    //  * @return Kraken[] Returns an array of Kraken objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kraken
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
