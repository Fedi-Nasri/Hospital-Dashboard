<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DateTime;
use DateInterval;
use Exception;
use DatePeriod;
/**
 * @extends ServiceEntityRepository<Patient>
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    public function findAllPatients(): array
    {
        return $this->findAll();
    }
    //function that counts all patient
    public function countP(): int
    {
        return $this->createQueryBuilder('P')
            ->select('COUNT(P.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
    
    //function that find the number of somthing depend on the last date in the db
    public function countPeopleCreatedOnLatestDate(): int
    {
        // Get the latest creation date
        $latestDateQuery = $this->createQueryBuilder('p')
        ->select('p.created_at')
        ->select('MAX(p.created_at)')
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
        ->where('p.created_at BETWEEN :startOfDay AND :endOfDay')
        ->setParameter('startOfDay', $startOfDay)
        ->setParameter('endOfDay', $endOfDay)
        ->getQuery();

        return (int) $countQuery->getSingleScalarResult();
    }

    // find patient by gender
    public function findPG(String $g): array
    {
        $qb = $this->createQueryBuilder('a')
            ->select('a.id, a.nom, a.prenom')
            ->where('a.genre = :genre')
            ->setParameter('genre', $g);

        return $qb->getQuery()->getArrayResult();
    }
    /**
     * Get the number of patients in a given date range.
     *
     * @param \DateTimeInterface $startDate
     * @param \DateTimeInterface $endDate
     * @return int
     */
    public function countPatientsInDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): int
    {
        $qb = $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->where('p.created_at >= :startDate')
            ->andWhere('p.created_at <= :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate);

        return (int) $qb->getQuery()->getSingleScalarResult();
    }
    /**
     * Get a list of months with their start and end dates within a specific duration.
     *
     * @param string $startDate The start date in 'Y-m-d H:i:s' format.
     * @param string $endDate The end date in 'Y-m-d H:i:s' format.
     * @return array
     * @throws Exception
     */
    public function getMonthsStartAndEndDates(string $startDate, string $endDate): array
    {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        $end->modify('last day of this month'); // Ensure the end date is at the end of the month.

        $months = [];

        // Adjust the start date to the beginning of the month if it's not already.
        $start->modify('first day of this month');
        
        // Create a period based on the months between start and end date.
        $interval = new DateInterval('P1M');
        $period = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {
            $monthStart = $dt->format('Y-m-01 00:00:00');
            $monthEnd = (clone $dt)->modify('last day of this month')->format('Y-m-t 23:59:59');
            
            // Adjust the month end if it surpasses the given end date.
            if (new DateTime($monthEnd) > $end) {
                $monthEnd = $end->format('Y-m-d 23:59:59');
            }

            // Add the month period to the list.
            $months[] = [
                'start' => $monthStart,
                'end' => $monthEnd,
            ];
        }

        return $months;
    } 

//  function that give an interval of days start and end in  a specific intervale

    function getDailyIntervals($startDate, $endDate) {
        // Create DateTime objects for start and end dates
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
    
        // Initialize an empty array to hold the daily intervals
        $dailyIntervals = [];
    
        // Add a day to the end date to make the end date exclusive
        $end->modify('+1 day');
    
        // Create a DateInterval for one day
        $interval = new DateInterval('P1D');
    
        // Create a DatePeriod object to iterate through each day
        $period = new DatePeriod($start, $interval, $end);
    
        // Iterate through the period
        foreach ($period as $date) {
            // Get the start and end of the current day
            $dayStart = $date->format('Y-m-d 00:00:00');
            $dayEnd = $date->format('Y-m-d 23:59:59');
    
            // Add the start and end of the day to the results array
            $dailyIntervals[] = [
                'start' => $dayStart,
                'end'   => $dayEnd
            ];
        }
    
        return $dailyIntervals;
    }
    
    //    /**
    //     * @return Patient[] Returns an array of Patient objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Patient
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
