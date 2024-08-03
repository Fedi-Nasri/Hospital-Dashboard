<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PatientsInfoController extends AbstractController
{
    #[Route('/patients/info', name: 'app_patients_info')]
    public function index(PatientRepository $patientRepository): Response
    {
        $patients = $patientRepository->findAllPatients();
        return $this->render('patients_info/index.html.twig', [
            'patients' => $patients,
        ]);
    }
}
