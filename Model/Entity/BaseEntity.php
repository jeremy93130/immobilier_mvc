<?php

namespace Model\Entity;

abstract class BaseEntity
{
    protected $id;
    protected $created_at;
    protected $updated_at;
    protected $is_deleted;

    public function __toString()
    {
        // retourne le nom de la classe à partir de son namespace
        // exemple : Model\Entity\Product
        $class = get_called_class();

        // Découpe une chaine de caractères dès qu'il rencontre un caractère spécifique, ici le '\'
        // Elle retourne ensuite un tableau indéxé contenant les éléments dans la chaine de caractères
        // exemple : ["Model","Entity","Product"]

        $class = explode("\\", $class);
        $table = $class[count($class) - 1];

        return strtolower($table);
    }

    public function getId()
    {
        return $this->id;
    }

    /** Set la valeur de Id
     * 
     * @return self
     */

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get the value of is_deleted
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set the value of is_deleted
     *
     * @return  self
     */
    public function setIsDeleted($isDeleted)
    {
        $this->is_deleted = $isDeleted;

        return $this;
    }
}