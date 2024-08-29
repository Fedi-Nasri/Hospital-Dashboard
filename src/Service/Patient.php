<?php

namespace App\Service;

use Doctrine\DBAL\Connection;

class Patient
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getPatientId($id): ?array 
    {
        
        // SQL query with a WHERE clause to filter by ID
        $sql = ' 
        SELECT 
        id,dossier_medical_id,id_sante,full_name,provenance,
        genre,date_naissance,cin,adresse,nom_arab,prenom_arab,
        identifiant_assure ,created_at,telephone,email
        FROM patient
        WHERE id = :id_patient
        ' ; 
        
        // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
        // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery(['id_patient'=> $id]);

        // Fetch the result as an associative array
        return $result->fetchAssociative(); 
    }

        //Function Get consultation of the patient with id
    public function getPatientId_Consultation($id){

        // SQL query with a WHERE clause to filter by ID
        $sql = ' 
            SELECT
                c.id AS consultation_id,
                c.inscription_id,
                c.date_creation,
                c.statut,
                c.type,
                i.medecin_id,
                m.nom AS medecin_nom,
                m.prenom AS medecin_prenom,
                pd.libelle AS profession_libelle
            FROM
                public.consultation_generale c
            JOIN
                public.inscription i ON c.inscription_id = i.id
            JOIN
                public.patient p ON i.patient_id = p.id
            JOIN
                public.medecin m ON i.medecin_id = m.id
            LEFT JOIN
                public.profession_dmi pd ON m.profession_dmi_id = pd.id
            WHERE
                p.id = :id_patient
        ' ; 
        
        // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
        // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery(['id_patient'=> $id]);

        // Fetch the result as an associative array
        return $result->fetchAllAssociative(); 
    }

    //Function Get Inscription of the patient with id
    public function getPatientId_Inscription($id){

        // SQL query with a WHERE clause to filter by ID
        $sql = ' 
            SELECT 
            i.id,
            i.service_id,
            i.medecin_id,
            i.mode_soin,
            i.etablissement_id,
            i.type,
            i.date_inscription,
            i.mnt_payer,
            s.libelle,
            m.nom AS medecin_nom,
            m.prenom AS medecin_prenom,
            e.libelle AS etablissement_libelle,
            c.libelle AS mode_soin_libelle,
            t.libelle AS etat_de_soin
            FROM 
                inscription i
            JOIN
                service s ON i.service_id = s.id
            JOIN
                medecin m ON i.medecin_id = m.id
            JOIN
                etablissement e ON i.etablissement_id = e.id
            JOIN 
                cause_soin c ON i.mode_soin = c.code
            JOIN 
                cause_soin t ON i.etat_soin = t.code
                
            where i.patient_id = :id_patient
        ' ; 
        
        // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
        // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery(['id_patient'=> $id]);

        // Fetch the result as an associative array
        return $result->fetchAllAssociative(); 

    }

}