<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActorRepository::class)]
class Actor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $token_api = null;

    #[ORM\Column(nullable: true)]
    private ?int $annuaire_user_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $annuaire_fullname = null;

    #[ORM\Column(nullable: true)]
    private ?int $annuaire_fonction_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $annuaire_fonction_libelle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $annuaire_lieux_exercices_user = null;

    #[ORM\Column(nullable: true)]
    private ?int $profession_dmi_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $matricule = null;

    #[ORM\Column(nullable: true)]
    private ?int $annuaire_etablissement_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $annuaire_etablissement_libelle = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_etablissement_selectionne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $annuaire_service_id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $annuaire_service_designation = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mobile = null;

    #[ORM\Column(nullable: true)]
    private ?bool $admin_dmi = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getTokenApi(): ?string
    {
        return $this->token_api;
    }

    public function setTokenApi(?string $token_api): static
    {
        $this->token_api = $token_api;

        return $this;
    }

    public function getAnnuaireUserId(): ?int
    {
        return $this->annuaire_user_id;
    }

    public function setAnnuaireUserId(?int $annuaire_user_id): static
    {
        $this->annuaire_user_id = $annuaire_user_id;

        return $this;
    }

    public function getAnnuaireFullname(): ?string
    {
        return $this->annuaire_fullname;
    }

    public function setAnnuaireFullname(?string $annuaire_fullname): static
    {
        $this->annuaire_fullname = $annuaire_fullname;

        return $this;
    }

    public function getAnnuaireFonctionId(): ?int
    {
        return $this->annuaire_fonction_id;
    }

    public function setAnnuaireFonctionId(?int $annuaire_fonction_id): static
    {
        $this->annuaire_fonction_id = $annuaire_fonction_id;

        return $this;
    }

    public function getAnnuaireFonctionLibelle(): ?string
    {
        return $this->annuaire_fonction_libelle;
    }

    public function setAnnuaireFonctionLibelle(?string $annuaire_fonction_libelle): static
    {
        $this->annuaire_fonction_libelle = $annuaire_fonction_libelle;

        return $this;
    }

    public function getAnnuaireLieuxExercicesUser(): ?string
    {
        return $this->annuaire_lieux_exercices_user;
    }

    public function setAnnuaireLieuxExercicesUser(?string $annuaire_lieux_exercices_user): static
    {
        $this->annuaire_lieux_exercices_user = $annuaire_lieux_exercices_user;

        return $this;
    }

    public function getProfessionDmiId(): ?int
    {
        return $this->profession_dmi_id;
    }

    public function setProfessionDmiId(?int $profession_dmi_id): static
    {
        $this->profession_dmi_id = $profession_dmi_id;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getAnnuaireEtablissementId(): ?int
    {
        return $this->annuaire_etablissement_id;
    }

    public function setAnnuaireEtablissementId(?int $annuaire_etablissement_id): static
    {
        $this->annuaire_etablissement_id = $annuaire_etablissement_id;

        return $this;
    }

    public function getAnnuaireEtablissementLibelle(): ?string
    {
        return $this->annuaire_etablissement_libelle;
    }

    public function setAnnuaireEtablissementLibelle(?string $annuaire_etablissement_libelle): static
    {
        $this->annuaire_etablissement_libelle = $annuaire_etablissement_libelle;

        return $this;
    }

    public function isEtablissementSelectionne(): ?bool
    {
        return $this->is_etablissement_selectionne;
    }

    public function setEtablissementSelectionne(?bool $is_etablissement_selectionne): static
    {
        $this->is_etablissement_selectionne = $is_etablissement_selectionne;

        return $this;
    }

    public function getAnnuaireServiceId(): ?string
    {
        return $this->annuaire_service_id;
    }

    public function setAnnuaireServiceId(?string $annuaire_service_id): static
    {
        $this->annuaire_service_id = $annuaire_service_id;

        return $this;
    }

    public function getAnnuaireServiceDesignation(): ?string
    {
        return $this->annuaire_service_designation;
    }

    public function setAnnuaireServiceDesignation(?string $annuaire_service_designation): static
    {
        $this->annuaire_service_designation = $annuaire_service_designation;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;

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

    public function isAdminDmi(): ?bool
    {
        return $this->admin_dmi;
    }

    public function setAdminDmi(?bool $admin_dmi): static
    {
        $this->admin_dmi = $admin_dmi;

        return $this;
    }
}
