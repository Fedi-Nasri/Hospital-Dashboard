<?php

namespace App\Controller;

use App\Service\Medecin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MedecinesInfoController extends AbstractController
{
    #[Route('/medecins/info/{id_medecin}', name: 'app_medecines_info',requirements: ['id_medecin' => '\d+'])]
    public function index(Medecin $medecin,$id_medecin): Response
    {

        $data =$medecin->getMedecinID($id_medecin);
        $services=$medecin->getMedecinservice($data['annuaire_service_id']);
        $consultation_medecin = $medecin->getMedecinALLConsultation($id_medecin);
        $nb_patient =$medecin->getMedecinALLConsultationNb($id_medecin);

        return $this->render('medecines_info/index.html.twig', [
            'medecin'=>$data,
            'services'=>$services,
            'nb_patient'=>$nb_patient,
            'consultations'=>$consultation_medecin,
            'controller_name' => 'MedecinesInfoController',
        ]);
    }
}
