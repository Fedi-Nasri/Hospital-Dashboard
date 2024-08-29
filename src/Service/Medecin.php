<?php

namespace App\Service;

use Doctrine\DBAL\Connection;

class Medecin
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getMedecin(): ?array
    {
        
        
        $sql = ' 
            SELECT 
                m.id,
                m.nom,
                m.prenom,
                m.mobile,
                m.actif,
                gs.libelle AS groupe_soin_libelle,
                pd.libelle AS profession_libelle,
                a.email AS email
            FROM 
                medecin m
            LEFT JOIN 
                groupe_soin gs ON m.groupe_soin_id = gs.id
            LEFT JOIN 
                profession_dmi pd ON m.profession_dmi_id = pd.id
            LEFT JOIN 
                actor a ON m.actor_id = a.id
        ' ; 
        
        // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
        // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery();

        // Fetch the result as an associative array
        return $result->fetchAllAssociative(); 
    }
    
    public function getMedecinID($id){
        
        $sql = ' 
            SELECT 
                m.id,
                m.mobile,
                m.actif,
                m.nom,
                m.prenom,
                pd.libelle,
                g.libelle AS groupe_soin,
                a.email,
                a.annuaire_fonction_libelle,
                a.annuaire_etablissement_libelle,
                a.annuaire_service_id
                
            FROM medecin m
            JOIN 
                profession_dmi pd ON  m.profession_dmi_id = pd.id 
            JOIN 
                groupe_soin g ON  m.groupe_soin_id =g.id
            LEFT JOIN
                actor a ON m.actor_id = a.id
            LEFT JOIN 
                service s ON  CAST(a.annuaire_service_id AS INTEGER) = s.id
            
            WHERE m.id = :id_medecin  
        ' ; 
        
         // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
         // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery(['id_medecin'=> $id]);
         // Fetch the result as an associative array
        return $result->fetchAssociative(); 
    }

    public function getMedecinALLConsultation($id){
        
        $sql = ' 
            SELECT 
                i.patient_id,
                i.nom_affilie AS nom,
                i.prenom_affilie AS prenom,
                s2.libelle AS etat_soin,
                s.libelle AS mode_soin,
                i.date_inscription,
                i.id
                
            FROM 
                inscription i
            JOIN 
                cause_soin s ON i.mode_soin = s.code 
            JOIN 
                cause_soin s2 ON i.etat_soin= s2.code
            WHERE medecin_id = :id
        ' ; 
        
         // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
         // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery(['id'=> $id]);
         // Fetch the result as an associative array
        return $result->fetchAllAssociative();
    }
    public function getMedecinALLConsultationNb($id){
        
        $sql = ' 
            SELECT 
                COUNT(id) AS nb_patient
            FROM 
                inscription 
            WHERE medecin_id = :id
        ' ; 
        
         // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
         // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery(['id'=> $id]);
         // Fetch the result as an associative array
        return $result->fetchAssociative();
    }

    public function getMedecinservice($jsonServices){
            // Decode the JSON string into a PHP array
        $servicesArray = json_decode($jsonServices, true);

        // Check if the JSON was decoded successfully and is an array
        if (!is_array($servicesArray)) {
            return [];
        }

        // Sanitize the array to ensure it only contains integers and remove duplicates and empty values
        $servicesArray = array_map('intval', $servicesArray);
        $servicesArray = array_filter(array_unique($servicesArray));

        // If the array is empty, return an empty array
        if (empty($servicesArray)) {
            return [];
        }

        // Create a comma-separated list of placeholders for the SQL query
        $placeholders = implode(',', array_fill(0, count($servicesArray), '?'));

        // Prepare the SQL statement with an IN clause
        $sql = "
            SELECT libelle
            FROM service
            WHERE id IN ($placeholders)
        ";

        // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);

        // Execute the SQL statement with the provided IDs
        $results = $stmt->executeQuery($servicesArray);

        // Fetch all results as an associative array
        $libelles = $results->fetchAllAssociative();

        // Extract the 'libelle' values from the results
        return array_column($libelles, 'libelle');
    }
}