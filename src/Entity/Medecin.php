<?php

namespace App\Entity;

use App\Repository\MedecinRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedecinRepository::class)]
class Medecin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $groupe_soin_id = null;

    #[ORM\Column(length: 20)]
    private ?string $code = null;

    #[ORM\Column(length: 60)]
    private ?string $nom = null;

    #[ORM\Column(length: 60)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $profession_dmi_id = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $mobile = null;

    #[ORM\Column(nullable: true)]
    private ?int $actor_id = null;

    #[ORM\Column]
    private ?bool $actif = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_favoris_antecedent_updated = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_favoris_diagnostic_updated = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_favoris_motif_consultation_updated = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_favoris_antecedent_familiaux_updated = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupeSoinId(): ?int
    {
        return $this->groupe_soin_id;
    }

    public function setGroupeSoinId(int $groupe_soin_id): static
    {
        $this->groupe_soin_id = $groupe_soin_id;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfessionDmiId(): ?int
    {
        return $this->profession_dmi_id;
    }

    public function setProfessionDmiId(int $profession_dmi_id): static
    {
        $this->profession_dmi_id = $profession_dmi_id;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): static
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getActorId(): ?int
    {
        return $this->actor_id;
    }

    public function setActorId(?int $actor_id): static
    {
        $this->actor_id = $actor_id;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): static
    {
        $this->actif = $actif;

        return $this;
    }

    public function isFavorisAntecedentUpdated(): ?bool
    {
        return $this->is_favoris_antecedent_updated;
    }

    public function setFavorisAntecedentUpdated(?bool $is_favoris_antecedent_updated): static
    {
        $this->is_favoris_antecedent_updated = $is_favoris_antecedent_updated;

        return $this;
    }

    public function isFavorisDiagnosticUpdated(): ?bool
    {
        return $this->is_favoris_diagnostic_updated;
    }

    public function setFavorisDiagnosticUpdated(?bool $is_favoris_diagnostic_updated): static
    {
        $this->is_favoris_diagnostic_updated = $is_favoris_diagnostic_updated;

        return $this;
    }

    public function isFavorisMotifConsultationUpdated(): ?bool
    {
        return $this->is_favoris_motif_consultation_updated;
    }

    public function setFavorisMotifConsultationUpdated(?bool $is_favoris_motif_consultation_updated): static
    {
        $this->is_favoris_motif_consultation_updated = $is_favoris_motif_consultation_updated;

        return $this;
    }

    public function isFavorisAntecedentFamiliauxUpdated(): ?bool
    {
        return $this->is_favoris_antecedent_familiaux_updated;
    }

    public function setFavorisAntecedentFamiliauxUpdated(?bool $is_favoris_antecedent_familiaux_updated): static
    {
        $this->is_favoris_antecedent_familiaux_updated = $is_favoris_antecedent_familiaux_updated;

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
}
