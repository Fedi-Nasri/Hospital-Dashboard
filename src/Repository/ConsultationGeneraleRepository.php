<?php

namespace App\Repository;

use App\Entity\ConsultationGenerale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DateTime;
/**
 * @extends ServiceEntityRepository<ConsultationGenerale>
 */
class ConsultationGeneraleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConsultationGenerale::class);
    }

    public function countC(): int
    {
        return $this->createQueryBuilder('m')
            ->select('COUNT(m.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
    
    public function countPeopleCreatedOnLatestDate(): int
    {
        // Get the latest creation date
        $latestDateQuery = $this->createQueryBuilder('p')
        ->select('p.date_creation')
        ->select('MAX(p.date_creation)')
        ->getQuery();

        $latestDate = $latestDateQuery->getSingleScalarResult();

        if (!$latestDate) {
            return 0;
        }

       // $latestDatetime = (new DateTime($latestDate))->format('Y-m-d ');
        
        // Create DateTime object for the latest date
        $latestDateTime = new \DateTime($latestDate);
        
        // Set the time to 23:00:00
        $latestDateTime->setTime(23, 0, 0);

        // Use the formatted date-time for the end of the day
        $endOfDay = $latestDateTime->format('Y-m-d H:i:s');
    
    // Set the start of the day
    $startOfDay = (new \DateTime($latestDate))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
        // Count people created on the latest date
        $countQuery = $this->createQueryBuilder('p')
        ->select('COUNT(p.id)')
        ->where('p.date_creation BETWEEN :startOfDay AND :endOfDay')
        ->setParameter('startOfDay', $startOfDay)
        ->setParameter('endOfDay', $endOfDay)
        ->getQuery();

        return (int) $countQuery->getSingleScalarResult();
    }

    //    /**
    //     * @return ConsultationGenerale[] Returns an array of ConsultationGenerale objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ConsultationGenerale
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
