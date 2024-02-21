<?php

namespace Model\Entity;


class Postulant extends BaseEntity
{
    private $genre;
    private $prenom;
    private $nom;
    private $email;
    private $mot_de_passe;
    private $date_naissance;
    private $profession;
    private $salaire;
    private $telephone;
    private $admin;


    /**
     * Get the value of gender
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of Prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of Nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of Nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of birthday
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */
    public function setDateNaissance($date_naissance)
    {
        $dateTime = new \DateTime($date_naissance);
        $this->date_naissance = $dateTime->format('Y-m-d');

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setAdmin($admin)
    {
        // Assurez-vous que le rôle est soit "oui" ou "non"
        $this->admin = ($admin !== null && ($admin === "oui" || $admin === "non")) ? $admin : "non";

        return $this;
    }

    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

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

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }
}