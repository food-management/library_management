<?php

namespace App\Repository;

use App\Entity\BorrowerList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BorrowerList>
 *
 * @method BorrowerList|null find($id, $lockMode = null, $lockVersion = null)
 * @method BorrowerList|null findOneBy(array $criteria, array $orderBy = null)
 * @method BorrowerList[]    findAll()
 * @method BorrowerList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BorrowerListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BorrowerList::class);
    }

    public function save(BorrowerList $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BorrowerList $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//     SELECT bl.id, u.name, b.name, bl.borrowed_date, bl.return_date, bl.status
// FROM `user` u, `book` b, `borrower_list` bl
// WHERE u.id=bl.id AND bl.id=b.id
   /**
    * @return BorrowerList[] Returns an array of BorrowerList objects
    */
   public function BorrowerListShow($value): array
   {
    $en = $this->getEntityManager()->getConnection();
    $sql = '
        SELECT bl.id, u.name, b.name, bl.borrowed_date, bl.return_date, bl.status
        FROM `user` u, `book` b, `borrower_list` bl
        WHERE u.id=bl.id AND bl.id=b.id
    ';
    $stmt = $en->prepare($sql);
    $re = $stmt->executeQuery();
    return $re->fetchAllAssociative();

   }













//    /**
//     * @return BorrowerList[] Returns an array of BorrowerList objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BorrowerList
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
