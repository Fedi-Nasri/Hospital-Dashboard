<?php

namespace App\Controller;

use App\Service\Medecin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MedecinsController extends AbstractController
{
    #[Route('/medecins', name: 'app_medecins')]
    public function index(Medecin $med ): Response
    {
        $medecin =$med->getMedecin();
        return $this->render('medecins/index.html.twig', [
            'medecins'=>$medecin,
            'controller_name' => 'MedecinsController',
        ]);
    }
}
