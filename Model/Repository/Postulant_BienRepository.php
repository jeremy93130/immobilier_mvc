<?php

namespace Model\Repository;

use Service\Session;
use Model\Entity\Bien_Postulant;

class Postulant_BienRepository extends BaseRepository
{

    public function insertBienPostulant(Bien_Postulant $bien_Postulant)
    {
        $sql = "INSERT INTO postulant_bien (postulant_id,bien_id,personne_additionnelle_id) VALUES (:postulant, :bien, :personne_additionnelle)";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":postulant", $bien_Postulant->getPostulantId());
        $request->bindValue(":bien", $bien_Postulant->getBienId());
        $request->bindValue(":personne_additionnelle", $bien_Postulant->getPersonneAdditionnelleId());

        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "Le nouvel utilisateur a bien été enregistré");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été enregistré");
            return false;
        }
    }


    public function updateBienPostulant(Bien_Postulant $bien_Postulant)
    {
        $sql = "UPDATE postulant_bien 
                SET postulant_id = :postulant, bien_id = :bien, personne_additionnelle = :personne
                WHERE id_postulant_bien = :id";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":id", $bien_Postulant->getId());
        $request->bindValue(":postulant", $bien_Postulant->getPostulantId());
        $request->bindValue(":bien", $bien_Postulant->getBienId());
        $request->bindValue(":personne", $bien_Postulant->getPersonneAdditionnelleId());

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