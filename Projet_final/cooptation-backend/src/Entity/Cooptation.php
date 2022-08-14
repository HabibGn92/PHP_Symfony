<?php

namespace App\Entity;

use App\Repository\CooptationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=CooptationRepository::class)
 */
class Cooptation
{
    const MALE = 'Homme';
    const FEMALE = 'Femme';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"cooptations"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"cooptations"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"cooptations"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"cooptations"})
     */
    private $cv;

    /**
     * @ORM\Column(type="string")
     * @Serializer\Groups({"cooptations"})
     */
    private $civility ;

    /**
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"cooptations"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"cooptations"})
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $professional_experience;

    /**
     * @ORM\Column(type="date")
     */
    private $application_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $current_position;

    /**
     * @ORM\Column(type="date")
     */
    private $first_experience_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fields_activity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $current_salary;

    /**
     * @ORM\Column(type="boolean")
     */
    private $key_figures;

    /**
     * @ORM\Column(type="date")
     */
    private $interview_date;

    /**
     * @ORM\Column(type="array")
     */
    private $interview_type = [];

    /**
     * @ORM\Column(type="array")
     */
    private $geographical_wishes = [];

    /**
     * @ORM\Column(type="text")
     */
    private $comments;

    /**
     * @ORM\Column(type="text")
     */
    private $personality;

    /**
     * @ORM\Column(type="text")
     */
    private $skils;

    /**
     * @ORM\Column(type="text")
     */
    private $experience;

    /**
     * @ORM\Column(type="array")
     */
    private $desired_salary = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $salary;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="cooptations")
      * @Serializer\Groups({"cooptations"})
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=CooptedEntity::class, inversedBy="cooptations")
     * @Serializer\Groups({"cooptations"})
     */
    private $coopted_entity;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="cooptation")
     * @Serializer\Groups({"cooptations"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility($civility)
    {
        if (!in_array($civility, array(self::MALE ,self::FEMALE))) {
            throw new \InvalidArgumentException("Invalid civility");
        }
        $this->civility = $civility;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getProfessionalExperience(): ?string
    {
        return $this->professional_experience;
    }

    public function setProfessionalExperience(string $professional_experience): self
    {
        $this->professional_experience = $professional_experience;

        return $this;
    }

    public function getApplicationDate(): ?\DateTimeInterface
    {
        return $this->application_date;
    }

    public function setApplicationDate(\DateTimeInterface $application_date): self
    {
        $this->application_date = $application_date;

        return $this;
    }

    public function getCurrentPosition(): ?string
    {
        return $this->current_position;
    }

    public function setCurrentPosition(string $current_position): self
    {
        $this->current_position = $current_position;

        return $this;
    }

    public function getFirstExperienceDate(): ?\DateTimeInterface
    {
        return $this->first_experience_date;
    }

    public function setFirstExperienceDate(\DateTimeInterface $first_experience_date): self
    {
        $this->first_experience_date = $first_experience_date;

        return $this;
    }

    public function getFieldsActivity(): ?bool
    {
        return $this->fields_activity;
    }

    public function setFieldsActivity(bool $fields_activity): self
    {
        $this->fields_activity = $fields_activity;

        return $this;
    }

    public function getCurrentSalary(): ?bool
    {
        return $this->current_salary;
    }

    public function setCurrentSalary(bool $current_salary): self
    {
        $this->current_salary = $current_salary;

        return $this;
    }

    public function getKeyFigures(): ?bool
    {
        return $this->key_figures;
    }

    public function setKeyFigures(bool $key_figures): self
    {
        $this->key_figures = $key_figures;

        return $this;
    }

    public function getInterviewDate(): ?\DateTimeInterface
    {
        return $this->interview_date;
    }

    public function setInterviewDate(\DateTimeInterface $interview_date): self
    {
        $this->interview_date = $interview_date;

        return $this;
    }

    public function getInterviewType(): ?array
    {
        return $this->interview_type;
    }

    public function setInterviewType(array $interview_type): self
    {
        $this->interview_type = $interview_type;

        return $this;
    }

    public function getGeographicalWishes(): ?array
    {
        return $this->geographical_wishes;
    }

    public function setGeographicalWishes(array $geographical_wishes): self
    {
        $this->geographical_wishes = $geographical_wishes;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getPersonality(): ?string
    {
        return $this->personality;
    }

    public function setPersonality(string $personality): self
    {
        $this->personality = $personality;

        return $this;
    }

    public function getSkils(): ?string
    {
        return $this->skils;
    }

    public function setSkils(string $skils): self
    {
        $this->skils = $skils;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getDesiredSalary(): ?array
    {
        return $this->desired_salary;
    }

    public function setDesiredSalary(array $desired_salary): self
    {
        $this->desired_salary = $desired_salary;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCooptedEntity(): ?CooptedEntity
    {
        return $this->coopted_entity;
    }

    public function setCooptedEntity(?CooptedEntity $coopted_entity): self
    {
        $this->coopted_entity = $coopted_entity;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
