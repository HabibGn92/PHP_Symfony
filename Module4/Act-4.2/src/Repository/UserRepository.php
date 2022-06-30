<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(User $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(User $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    // public function findById($id)
    // {
    //     return $this->createQueryBuilder('u')
    //         ->andWhere('u.id = :id')
    //         ->setParameter('id', $id)
    //         ->orderBy('u.id', 'ASC')
    //         ->setMaxResults(10)
    //          ->getQuery()
    //         ->getResult()
    //     ;
    // }

     /**
     * @return User
     */
    public function findById(int $id)
    {
        $query = $this->_em->createQuery(
            'SELECT u
            FROM App\Entity\User u
            WHERE u.id = :id'
        )->setParameter('id', $id);
        return $query->getResult();
    }
    
}
