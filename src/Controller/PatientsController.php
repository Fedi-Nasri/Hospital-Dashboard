<?php

namespace App\Controller;

use App\Service\Patient;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PatientsController extends AbstractController
{   
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
    #[Route('/patients/info/{id_patient}', name: 'app_patients',requirements: ['id_patient' => '\d+'])]
    public function index($id_patient,Patient $patient ): Response
    {
        // Define your SQL query
        $sql = 'SELECT 
                m.id AS medecin_id,
                m.nom AS medecin_nom,
                m.prenom AS medecin_prenom,
                gs.libelle AS groupe_soin_libelle
            FROM 
                Medecin m
            JOIN 
                groupe_soin gs
            ON 
                m.groupe_soin_id = gs.id
            WHERE m.id = :id_medecin ;';
        
        // Prepare and execute the SQL statement
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id_medecin', 1, \PDO::PARAM_INT);
        $results = $stmt->executeQuery();
        
        // Fetch all results
        $doctor = $results->fetchAllAssociative();

        $data =$patient->getPatientId($id_patient);

        $consultation_tab=$patient->getPatientId_Consultation($id_patient);

        $inscription_tab=$patient->getPatientId_Inscription($id_patient);

        return $this->render('patients/index.html.twig', [
            'patient'=> $data ,
            'consultations'=>$consultation_tab,
            'inscriptions'=>$inscription_tab,
            'id' => $id_patient,
            'test'=>$doctor,
        ]);
    }
}
