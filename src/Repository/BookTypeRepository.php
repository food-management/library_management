<?php

namespace App\Repository;

use App\Entity\BookType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BookType>
 *
 * @method BookType|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookType|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookType[]    findAll()
 * @method BookType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookType::class);
    }

    public function save(BookType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BookType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return BookType[] Returns an array of BookType objects
    */
   public function FilterBook($type): array
   {
       return $this->createQueryBuilder('bt')
    //    SELECT b.image, b.id, b.name, a.name, bt.book_category
    //    FROM `book` b, `book_type` bt, `author` a
    //    WHERE b.bookauthor_id = a.id AND b.booktype_id = bt.id

           ->select('book.image, book.id, book.name, author.name')

           ->innerJoin('bt.books', 'book')
           ->innerJoin('book.bookauthor', 'author')

           ->andWhere('bt.id = :val')
           ->setParameter('val', $type)
        //    ->orderBy('b.id', 'ASC')
        //    ->setMaxResults(10)
           ->getQuery()
           ->getArrayResult()
       ;
   }

















//    /**
//     * @return BookType[] Returns an array of BookType objects
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

//    public function findOneBySomeField($value): ?BookType
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
