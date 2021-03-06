<?php

namespace Nanotech\EasylinkBundle\Repository;

use Nanotech\EasylinkBundle\Entity\Utilisateur;

/**
 * OffreRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OffreRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByUserAnnonce(Utilisateur $user)
    {
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.client = :client')
            ->andWhere('o.avis IS NULL')
            ->setParameter('client', $user)
        ;
        return $qb;

    }
}
