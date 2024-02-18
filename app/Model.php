<?php
abstract class Model
{
    // Informations de la base de données
    private $host = 'localhost';
    private $db_name = 'immobilier';
    private $username = 'root';
    private $password = '';

    // On va également stocker les propriétés contenant la connexion
    // Protected = elle doit être utilisable et modifiable depuis les autres classes enfants
    protected $connexion;

    // Propriétés contenant les informations de requêtes
    public $table;
    public $id;

    public function dbConnect()
    {
        $this->connexion = null;

        try {
            $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->connexion->exec('set names utf8');
        } catch (PDOException $e) {
            echo 'Erreur :' . $e->getMessage();
        }
    }

    public function getAll(){
        $sql = 'SELECT * FROM ' . $this->table;
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getOne(){
        $sql = 'SELECT * FROM ' . $this->table . 'WHERE id=' . $this->id;
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
}
