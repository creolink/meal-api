<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Repository;

use App\Auth\Domain\Entity\UserPassword;
use App\Auth\Domain\Exception\InvalidUserDataException;
use App\Auth\Domain\Entity\User;
use App\Auth\Domain\Entity\UserEmail;
use App\Auth\Domain\UserRepository as DomainRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface, DomainRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof UserInterface) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword(new UserPassword($newEncodedPassword));

        $this->save($user);
    }

    /**
     * @throws InvalidUserDataException
     */
    public function save(UserInterface $user): void
    {
        try {
            $this->_em->persist($user);
            $this->_em->flush();
        } catch (ORMException $e) {
            throw new InvalidUserDataException($e->getMessage());
        }
    }

    public function delete(UserInterface $user): void
    {
        try {
            $this->_em->remove($user);
            $this->_em->flush();
        } catch (ORMException $e) {
            throw new InvalidUserDataException($e->getMessage());
        }
    }

    public function findOneByEmail(UserEmail $email): ?UserInterface
    {
        return $this->findOneBy(['email.value' => $email->value()]);
    }




    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;

        return $this->createQueryBuilder('u')
            ->andWhere('u.email.value = :email')
            ->setParameter('email', $email->value())
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
