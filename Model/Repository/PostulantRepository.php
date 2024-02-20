<?php

namespace Model\Repository;

use Model\Entity\Postulant;
use Service\Session;

class PostulantRepository extends BaseRepository
{
    public function checkUserExist($surname, $email)
    {
        $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM postulant WHERE email = :email OR surname = :surname");
        $request->bindParam(":surname", $surname);
        $request->bindParam(":email", $email);

        $request->execute();
        $count = $request->fetchColumn();
        return $count === 1 ? true : false;
    }

    public function insertPostulant(Postulant $user)
    {
        $sql = "INSERT INTO postulant (nom, prenom, genre, email, mot_de_passe, date_naissance, profession, salaire, telephone, admin) VALUES (:nom, :prenom, :genre, :email, :password, :birthday, :profession,:salaire,:telephone,:admin)";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":nom", $user->getLastname());
        $request->bindValue(":prenom", $user->getFirstname());
        $request->bindValue(":genre", $user->getGender());
        $request->bindValue(":email", $user->getEmail());
        $request->bindValue(":password", $user->getPassword());
        $request->bindValue(":birthday", $user->getBirthday());
        $request->bindValue(":profession", $user->getJob());
        $request->bindValue(":salaire", $user->getSalaire());
        $request->bindValue(":telephone", $user->getTelephone());
        $request->bindValue(":admin", $user->getRole());

        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "Le nouvel utilisateur a bien été enregistré");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été enregistré");
            return false;
        }
    }


    public function updateUser(Postulant $user)
    {
        $sql = "UPDATE postulant 
                SET nom = :nom, prenom = :prenom, genre = :genre, email = :email, mot_de_passe = :password, date_naissance = :birthday, profession = :profession,salaire = :salaire,telephone = :telephone,admin = :admin
                WHERE id = :id";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":id", $user->getId());
        $request->bindValue(":nom", $user->getLastname());
        $request->bindValue(":prenom", $user->getFirstname());
        $request->bindValue(":genre", $user->getGender());
        $request->bindValue(":email", $user->getEmail());
        $request->bindValue(":password", $user->getPassword());
        $request->bindValue(":birthday", $user->getBirthday());
        $request->bindValue(":profession", $user->getJob());
        $request->bindValue(":salaire", $user->getSalaire());
        $request->bindValue(":telephone", $user->getTelephone());
        $request->bindValue(":admin", $user->getRole());
        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "La mise à jour de l'utilisateur a bien été éffectuée");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été mise à jour");
            return false;
        }
    }

    public function loginUser($email)
    {
        $request = $this->dbConnection->prepare("SELECT * FROM postulant WHERE email = :email");
        $request->bindParam(":email", $email);

        if ($request->execute()) {
            if ($request->rowCount() == 1) {
                $request->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\Postulant");
                return $request->fetch();
            } else {
                return false;
            }
        } else {
            return null;
        }
    }
}