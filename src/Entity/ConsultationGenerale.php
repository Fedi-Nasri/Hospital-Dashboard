<?php

namespace App\Entity;

use App\Repository\ConsultationGeneraleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationGeneraleRepository::class)]
class ConsultationGenerale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $dossier_medical_id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $consultation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $synthese_medicale = null;

    #[ORM\Column(nullable: true)]
    private ?int $inscription_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?bool $items_cisp_updated = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $autre_motif_consultation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDossierMedicalId(): ?int
    {
        return $this->dossier_medical_id;
    }

    public function setDossierMedicalId(int $dossier_medical_id): static
    {
        $this->dossier_medical_id = $dossier_medical_id;

        return $this;
    }

    public function getConsultation(): ?string
    {
        return $this->consultation;
    }

    public function setConsultation(?string $consultation): static
    {
        $this->consultation = $consultation;

        return $this;
    }

    public function isSyntheseMedicale(): ?bool
    {
        return $this->synthese_medicale;
    }

    public function setSyntheseMedicale(?bool $synthese_medicale): static
    {
        $this->synthese_medicale = $synthese_medicale;

        return $this;
    }

    public function getInscriptionId(): ?int
    {
        return $this->inscription_id;
    }

    public function setInscriptionId(?int $inscription_id): static
    {
        $this->inscription_id = $inscription_id;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(?\DateTimeInterface $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isItemsCispUpdated(): ?bool
    {
        return $this->items_cisp_updated;
    }

    public function setItemsCispUpdated(?bool $items_cisp_updated): static
    {
        $this->items_cisp_updated = $items_cisp_updated;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getAutreMotifConsultation(): ?string
    {
        return $this->autre_motif_consultation;
    }

    public function setAutreMotifConsultation(?string $autre_motif_consultation): static
    {
        $this->autre_motif_consultation = $autre_motif_consultation;

        return $this;
    }
}
