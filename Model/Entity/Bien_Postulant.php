<?php

namespace Model\Entity;



class Bien_Postulant extends BaseEntity
{
    private int $postulantId;
    private int $bienId;
    private int $personneAdditionnelleId;


    public function getPostulantId()
    {
        return $this->postulantId;
    }

    public function setPostulantId(int $postulantId)
    {
        $this->postulantId = $postulantId;
        return $this;
    }

    public function getBienId()
    {
        return $this->bienId;
    }

    public function setBienId(int $bienId)
    {
        $this->bienId = $bienId;
        return $this;
    }

    public function getPersonneAdditionnelleId()
    {
        return $this->personneAdditionnelleId;
    }

    public function setPersonneAdditionnelleId(int $personneAdditionnelleId)
    {
        $this->personneAdditionnelleId = $personneAdditionnelleId;
        return $this;
    }
}