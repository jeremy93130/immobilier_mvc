<?php

namespace Model\Entity;

use Model\Entity\Postulant;

class Bien extends BaseEntity
{
    private $titre;
    private $code_postal;
    private $ville;
    private $nb_pieces;
    private $surface;
    private $style;
    private $parking;
    private $garage;
    private $prix_vente;
    private $loyer_HC;
    private $loyer_CC;
    private $consommation;
    private $zone;
    private $ascenseur;
    private $etage;
    private $image;

    private $achat_location;

    public function getTitre()
    {
        return $this->titre;
    }


    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getCodePostal()
    {
        return $this->code_postal;
    }

    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    public function getnbPieces()
    {
        return $this->nb_pieces;
    }

    public function setnbPieces($nb_pieces)
    {
        $this->nb_pieces = $nb_pieces;

        return $this;
    }


    public function getSurface()
    {
        return $this->surface;
    }


    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    public function getStyle()
    {
        return $this->style;
    }


    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    public function getParking()
    {
        return $this->parking;
    }

    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    public function getGarage()
    {
        return $this->garage;
    }

    public function setGarage($garage)
    {
        $this->garage = $garage;

        return $this;
    }
    public function getPrixVente()
    {
        return $this->prix_vente;
    }

    public function setPrixVente($prix_vente)
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    public function getLoyerHC()
    {
        return $this->loyer_HC;
    }

    public function setLoyerHC($loyer_HC)
    {
        $this->loyer_HC = $loyer_HC;

        return $this;
    }

    public function getLoyerCC()
    {
        return $this->loyer_CC;
    }

    public function setLoyerCC($loyer_CC)
    {
        $this->loyer_CC = $loyer_CC;

        return $this;
    }

    public function getConsommation()
    {
        return $this->consommation;
    }

    public function setConsommation($consommation)
    {
        $this->consommation = $consommation;

        return $this;
    }

    public function getZone()
    {
        return $this->zone;
    }

    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    public function getAscenseur()
    {
        return $this->ascenseur;
    }

    public function setAscenseur($ascenseur)
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    public function getEtage()
    {
        return $this->etage;
    }

    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getAchatLocation()
    {
        return $this->achat_location;
    }

    public function setAchatLocation($achat_location)
    {
        $this->achat_location = $achat_location;
        return $this;
    }
}
