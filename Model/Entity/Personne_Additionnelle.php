<?php

namespace Model\Entity;

use Model\Entity\Postulant;

class Personne_Additionnelle extends BaseEntity
{
    private $gender;
    private $firstname;
    private $lastname;
    private $birthday;
    private $job;
    private $salaire;
    private Postulant $postulant;


    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $dateTime = new \DateTime($birthday);
        $this->birthday = $dateTime->format('d-m-Y');

        return $this;
    }

    public function getJob()
    {
        return $this->job;
    }

    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    public function getSalaire()
    {
        return $this->salaire;
    }

    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
        return $this;
    }

    public function getPostulant()
    {
        return $this->postulant;
    }

    public function setPostulant(Postulant $postulant)
    {
        $this->postulant = $postulant;
        return $this;
    }
}