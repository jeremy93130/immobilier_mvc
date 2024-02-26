<?php

namespace Model\Entity;

class Messages extends BaseEntity
{
    private $message;
    private $date_message;
    private $postulant_id;
    private $telephone;


    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    public function getDateMessage()
    {
        return $this->date_message;
    }
    public function getPostulantId()
    {
        return $this->postulant_id;
    }
    public function setPostulantId($postulant_id)
    {
        $this->postulant_id = $postulant_id;
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