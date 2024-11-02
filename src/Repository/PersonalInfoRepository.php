<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DoctrineMigrations\old\PersonalInfo;

/**
 * @extends ServiceEntityRepository<PersonalInfo>
 */
class PersonalInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonalInfo::class);
    }
}
