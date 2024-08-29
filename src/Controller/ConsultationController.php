<?php

namespace App\Controller;

use App\Service\Consultation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConsultationController extends AbstractController
{
    #[Route('/consultation', name: 'app_consultation')]
    public function index(Consultation $consultation): Response
    {
        $consult = $consultation->getConsultation();

        return $this->render('consultation/index.html.twig', [
            'consultations'=>$consult,
            'controller_name' => 'ConsultationController',
        ]);
    }
}
