<?php

namespace Model\Repository;

use Model\Entity\Personne_Additionnelle;
use Service\Session;

class PersonneAdditionnelleRepository extends BaseRepository
{
    public function checkPersonneExist(Personne_Additionnelle $personne_Additionnelle)
    {
        $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM personne_additionnelle WHERE postulant_id = :postulant");
        $request->bindParam(":postulant", $personne_Additionnelle);

        $request->execute();
        $count = $request->fetchColumn();
        return $count === 1 ? true : false;
    }

    public function insertPersonneAdditionnelle(Personne_Additionnelle $personne_Additionnelle)
    {
        $sql = "INSERT INTO personne_additionnelle (genre,nom,prenom,date_naissance,profession,salaire,postulant_id) VALUES (:genre,:nom,:prenom,:date_naissance,:profession,:salaire,:postulant_id)";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":genre", $personne_Additionnelle->getGender());
        $request->bindValue(":nom", $personne_Additionnelle->getLastname());
        $request->bindValue(":prenom", $personne_Additionnelle->getFirstname());
        $request->bindValue(":date_naissance", $personne_Additionnelle->getBirthday());
        $request->bindValue(":profession", $personne_Additionnelle->getJob());
        $request->bindValue(":salaire", $personne_Additionnelle->getSalaire());
        $request->bindValue(":postulant_id", $personne_Additionnelle->getPostulant()->getId());

        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "Le nouvel utilisateur a bien été enregistré");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été enregistré");
            return false;
        }
    }


    public function updatePersonneAdditionnelle(Personne_Additionnelle $personne_Additionnelle)
    {
        $sql = "UPDATE personne_additionnelle 
                SET genre = :genre, nom = :nom, prenom = :prenom,date_naissance = :birthday, profession = :profession,salaire = :salaire, postulant_id =:postulant_id
                WHERE id = :id";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":id", $personne_Additionnelle->getId());
        $request->bindValue(":genre", $personne_Additionnelle->getGender());
        $request->bindValue(":nom", $personne_Additionnelle->getLastname());
        $request->bindValue(":prenom", $personne_Additionnelle->getFirstname());
        $request->bindValue(":birthday", $personne_Additionnelle->getBirthday());
        $request->bindValue(":profession", $personne_Additionnelle->getJob());
        $request->bindValue(":salaire", $personne_Additionnelle->getSalaire());
        $request->bindValue(":postulant_id", $personne_Additionnelle->getPostulant()->getId());

        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "La mise à jour de l'utilisateur a bien été éffectuée");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été mise à jour");
            return false;
        }
    }
}