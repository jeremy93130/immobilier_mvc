<?php

namespace Model;

class Database
{
    // connetion à la base de données
    private $host = "localhost";
    private $db_name = "immobilier_mvc";
    private $username = "root";
    private $password = "";
    private $connexion = null;

    // getter pour la connetion
    public function bddConnect()
    {
        try {
            $pdo = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->connexion = $pdo;
        } catch (\PDOException $exception) {
            echo "Erreur de connetion : " . $exception->getMessage();
        }

        return $this->connexion;
    }
}
