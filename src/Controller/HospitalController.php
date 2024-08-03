<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use App\Repository\ConsultationGeneraleRepository;
use App\Repository\MedecinRepository;
use App\Repository\PatientRepository;
use Composer\Semver\Interval;
use Composer\Semver\Intervals;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HospitalController extends AbstractController
{
    #[Route('/hospital', name: 'app_hospital')]
    public function index(MedecinRepository $medecin,PatientRepository $patient,ConsultationGeneraleRepository $ConsultationGenerale ,ActorRepository $actor ): Response
    {
            // fetch the count of patient medecin actor and get the nb of p in the last date 
            $countallpatient = $patient->countp();
            $lastpatien = $patient->countPeopleCreatedOnLatestDate();
            $countmed =$medecin->countM();
            $stuff= $actor->counta();

            //fetch all consultations 
            
            $consultCountAll = $ConsultationGenerale->countC();
            $count = $ConsultationGenerale->countPeopleCreatedOnLatestDate();
            
            $intervals =$patient->getDailyIntervals('2023-4-1','2023-5-31');
            // Initialize the data array with 'chart1'
            $data = ['chart1' => []];
            foreach ($intervals as $date){
                $s=new \DateTime($date['start']) ;
                $e=new \DateTime ($date['end']) ;

                $data['chart1'][] = $patient->countPatientsInDateRange($s,$e);
            }



            //data pass chartpastient 
            //$data = [
            //    'chart1' => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20,20, 18, 18, 20, 20, 18, 20, 20, 22],
            // ];

            //$startDate = new \DateTime('2023-05-01 00:00:00');
            //$endDate = new \DateTime('2023-5-31 12:00:00');
        
            //$count = $patient->countPatientsInDateRange($startDate, $endDate);
            //$dates=$patient->getMonthsStartAndEndDates('2023-5-1 00:00:00 ','2023-2-30 23:00:00');



        return $this->render('hospital/index.html.twig', [
            'datesArray'=>$intervals,
            'data'=> $data,
            'medecincount'=> $countmed,
            'countAllP' => $countallpatient,
            'lastP'=>$lastpatien,
            'ConsultAllCount'=>$consultCountAll,
            'lastdate'=> $count,
            'countstuff'=>$stuff,
            'chart_data' => $data,
        ]);
    }
    

}
