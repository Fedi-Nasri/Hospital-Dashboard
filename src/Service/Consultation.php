<?php
namespace App\Service;

use Doctrine\DBAL\Connection;

class Consultation
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getConsultation(): ?array 
    {
        
        
        $sql = ' 
            SELECT 
                c.id,
                i.nom_affilie AS nom,      
                i.prenom_affilie AS prenom, 
                c.dossier_medical_id,
                c.type,
                c.statut,
                c.date_creation
            FROM 
                consultation_generale c
            JOIN 
                inscription i ON c.inscription_id = i.id; -- Proper join condition
        ' ; 
        
        // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        
        // Execute the SQL statement with the provided ID
        $result=$stmt->executeQuery();

        // Fetch the result as an associative array
        return $result->fetchAllAssociative(); 
    }
}