<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $dossier_medical_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $gouvernorat_adresse_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $gouvernorat_naissance_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $nationalite_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $delegation_naissance_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $delegation_adresse_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $profession_id = null;

    #[ORM\Column(length: 30)]
    private ?string $id_sante = null;

    #[ORM\Column(length: 40)]
    private ?string $nom = null;

    #[ORM\Column(length: 40)]
    private ?string $prenom = null;

    #[ORM\Column(length: 1)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $cin = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $nom_jeune_fille = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $prenom_pere = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $prenom_mere = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $regime_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $qualite_id = null;

    #[ORM\Column]
    private ?bool $provisoire = null;

    #[ORM\Column]
    private ?bool $certifie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etat_civil = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $num_carnet = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $matricule_assure = null;

    #[ORM\Column(nullable: true)]
    private ?int $rang = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $nom_affilie = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $prenom_affilie = null;

    #[ORM\Column(nullable: true)]
    private ?bool $droit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $motif = null;

    #[ORM\Column(nullable: true)]
    private ?int $exonere_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filiere = null;

    #[ORM\Column(nullable: true)]
    private ?bool $date_approximative = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $qrcode = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $prenom_arab = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $nom_arab = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $identifiant_assure = null;

    #[ORM\Column(nullable: true)]
    private ?int $etablissement_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $actor_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $full_name = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $provenance = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

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

    public function getGouvernoratAdresseId(): ?int
    {
        return $this->gouvernorat_adresse_id;
    }

    public function setGouvernoratAdresseId(?int $gouvernorat_adresse_id): static
    {
        $this->gouvernorat_adresse_id = $gouvernorat_adresse_id;

        return $this;
    }

    public function getGouvernoratNaissanceId(): ?int
    {
        return $this->gouvernorat_naissance_id;
    }

    public function setGouvernoratNaissanceId(?int $gouvernorat_naissance_id): static
    {
        $this->gouvernorat_naissance_id = $gouvernorat_naissance_id;

        return $this;
    }

    public function getNationaliteId(): ?int
    {
        return $this->nationalite_id;
    }

    public function setNationaliteId(?int $nationalite_id): static
    {
        $this->nationalite_id = $nationalite_id;

        return $this;
    }

    public function getDelegationNaissanceId(): ?int
    {
        return $this->delegation_naissance_id;
    }

    public function setDelegationNaissanceId(?int $delegation_naissance_id): static
    {
        $this->delegation_naissance_id = $delegation_naissance_id;

        return $this;
    }

    public function getDelegationAdresseId(): ?int
    {
        return $this->delegation_adresse_id;
    }

    public function setDelegationAdresseId(?int $delegation_adresse_id): static
    {
        $this->delegation_adresse_id = $delegation_adresse_id;

        return $this;
    }

    public function getProfessionId(): ?int
    {
        return $this->profession_id;
    }

    public function setProfessionId(?int $profession_id): static
    {
        $this->profession_id = $profession_id;

        return $this;
    }

    public function getIdSante(): ?string
    {
        return $this->id_sante;
    }

    public function setIdSante(string $id_sante): static
    {
        $this->id_sante = $id_sante;

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

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNomJeuneFille(): ?string
    {
        return $this->nom_jeune_fille;
    }

    public function setNomJeuneFille(?string $nom_jeune_fille): static
    {
        $this->nom_jeune_fille = $nom_jeune_fille;

        return $this;
    }

    public function getPrenomPere(): ?string
    {
        return $this->prenom_pere;
    }

    public function setPrenomPere(?string $prenom_pere): static
    {
        $this->prenom_pere = $prenom_pere;

        return $this;
    }

    public function getPrenomMere(): ?string
    {
        return $this->prenom_mere;
    }

    public function setPrenomMere(?string $prenom_mere): static
    {
        $this->prenom_mere = $prenom_mere;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRegimeId(): ?int
    {
        return $this->regime_id;
    }

    public function setRegimeId(?int $regime_id): static
    {
        $this->regime_id = $regime_id;

        return $this;
    }

    public function getQualiteId(): ?int
    {
        return $this->qualite_id;
    }

    public function setQualiteId(?int $qualite_id): static
    {
        $this->qualite_id = $qualite_id;

        return $this;
    }

    public function isProvisoire(): ?bool
    {
        return $this->provisoire;
    }

    public function setProvisoire(bool $provisoire): static
    {
        $this->provisoire = $provisoire;

        return $this;
    }

    public function isCertifie(): ?bool
    {
        return $this->certifie;
    }

    public function setCertifie(bool $certifie): static
    {
        $this->certifie = $certifie;

        return $this;
    }

    public function getEtatCivil(): ?string
    {
        return $this->etat_civil;
    }

    public function setEtatCivil(?string $etat_civil): static
    {
        $this->etat_civil = $etat_civil;

        return $this;
    }

    public function getNumCarnet(): ?string
    {
        return $this->num_carnet;
    }

    public function setNumCarnet(?string $num_carnet): static
    {
        $this->num_carnet = $num_carnet;

        return $this;
    }

    public function getMatriculeAssure(): ?string
    {
        return $this->matricule_assure;
    }

    public function setMatriculeAssure(?string $matricule_assure): static
    {
        $this->matricule_assure = $matricule_assure;

        return $this;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(?int $rang): static
    {
        $this->rang = $rang;

        return $this;
    }

    public function getNomAffilie(): ?string
    {
        return $this->nom_affilie;
    }

    public function setNomAffilie(?string $nom_affilie): static
    {
        $this->nom_affilie = $nom_affilie;

        return $this;
    }

    public function getPrenomAffilie(): ?string
    {
        return $this->prenom_affilie;
    }

    public function setPrenomAffilie(?string $prenom_affilie): static
    {
        $this->prenom_affilie = $prenom_affilie;

        return $this;
    }

    public function isDroit(): ?bool
    {
        return $this->droit;
    }

    public function setDroit(?bool $droit): static
    {
        $this->droit = $droit;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getExonereId(): ?int
    {
        return $this->exonere_id;
    }

    public function setExonereId(?int $exonere_id): static
    {
        $this->exonere_id = $exonere_id;

        return $this;
    }

    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    public function setFiliere(?string $filiere): static
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function isDateApproximative(): ?bool
    {
        return $this->date_approximative;
    }

    public function setDateApproximative(?bool $date_approximative): static
    {
        $this->date_approximative = $date_approximative;

        return $this;
    }

    public function getQrcode(): ?string
    {
        return $this->qrcode;
    }

    public function setQrcode(?string $qrcode): static
    {
        $this->qrcode = $qrcode;

        return $this;
    }

    public function getPrenomArab(): ?string
    {
        return $this->prenom_arab;
    }

    public function setPrenomArab(?string $prenom_arab): static
    {
        $this->prenom_arab = $prenom_arab;

        return $this;
    }

    public function getNomArab(): ?string
    {
        return $this->nom_arab;
    }

    public function setNomArab(?string $nom_arab): static
    {
        $this->nom_arab = $nom_arab;

        return $this;
    }

    public function getIdentifiantAssure(): ?string
    {
        return $this->identifiant_assure;
    }

    public function setIdentifiantAssure(?string $identifiant_assure): static
    {
        $this->identifiant_assure = $identifiant_assure;

        return $this;
    }

    public function getEtablissementId(): ?int
    {
        return $this->etablissement_id;
    }

    public function setEtablissementId(?int $etablissement_id): static
    {
        $this->etablissement_id = $etablissement_id;

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

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    public function setFullName(?string $full_name): static
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getProvenance(): ?string
    {
        return $this->provenance;
    }

    public function setProvenance(?string $provenance): static
    {
        $this->provenance = $provenance;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
