<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use App\Repository\ConsultationGeneraleRepository;
use App\Repository\MedecinRepository;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
            
            $intervals =$patient->getDailyIntervals('2023-5-9','2024-08-07');

            $arraytest = $patient->findUsersWithNonNullDateCreateAt();
            $processedArray = $patient->processPatientArray($arraytest);
            // Initialize the data array with 'chart1'
            $data = [
                'chart1' => [0],
                'datesinterval'=> [""],
                'dataAge'=>$processedArray
            ];
            foreach ($intervals as $date){
                $s=new \DateTime($date['start']) ;
                $e=new \DateTime ($date['end']) ;

                $data['chart1'][] = $patient->countPatientsInDateRange($s,$e);
                $data['datesinterval'][] =  (new \DateTime($date['start']))->format('Y-m-d')   ;
            }




        return $this->render('hospital/index.html.twig', [
            'data'=> $data,
            'medecincount'=> $countmed,
            'countAllP' => $countallpatient,
            'lastP'=>$lastpatien,
            'ConsultAllCount'=>$consultCountAll,
            'lastdate'=> $count,
            'countstuff'=>$stuff,
        ]);
    }

}
