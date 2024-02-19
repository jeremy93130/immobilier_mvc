<?php

namespace Model\Repository;

use Model\Entity\Bien;
use Service\Session;

class BienRepository extends BaseRepository
{
    public function checkBienExist($titre)
    {
        $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM bien WHERE titre = :titre");
        $request->bindParam(":titre", $titre);

        $request->execute();
        $count = $request->fetchColumn();
        return $count === 1 ? true : false;
    }

    public function insertBien(Bien $bien)
    {
        $sql = "INSERT INTO bien (titre, code_postal,ville,nb_pieces,surface,style,parking,garage,prix_vente,loyer_HC,loyer_CC,consommation,zone,ascenseur,etage) VALUES (:titre, :code_postal, :ville, :nb_pieces, :surface, :style, :parking,:garage,:prix_vente,:loyer_HC,:loyer_CC,:consommation,:zone,:ascenseur,:etage)";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":lastname", $bien->getTitre());
        $request->bindValue(":firstname", $bien->getCodePostal());
        $request->bindValue(":gender", $bien->getVille());
        $request->bindValue(":email", $bien->getnbPieces());
        $request->bindValue(":password", $bien->getSurface());
        $request->bindValue(":birthday", $bien->getStyle());
        $request->bindValue(":profession", $bien->getParking());
        $request->bindValue(":salaire", $bien->getGarage());
        $request->bindValue(":telephone", $bien->getPrixVente());
        $request->bindValue(":admin", $bien->getLoyerHC());
        $request->bindValue(":admin", $bien->getLoyerCC());
        $request->bindValue(":admin", $bien->getConsommation());
        $request->bindValue(":admin", $bien->getZone());
        $request->bindValue(":admin", $bien->getAscenseur());
        $request->bindValue(":admin", $bien->getEtage());

        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "Le nouvel utilisateur a bien été enregistré");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été enregistré");
            return false;
        }
    }


    public function updateUser(Bien $bien)
    {
        $sql = "UPDATE bien 
                SET titre = :titre, code_postal = :codePostal, ville = :ville, nb_pieces = :nbPieces,surface= :surface, style = :style, parking = :parking,garage = :garage, prix_vente = :prixVente,loyer_HC = :loyerHC, loyer_CC = :loyer_CC,consommation = :consommation, zone = :zone,ascenseur = :ascenseur, etage = :etage
                WHERE id = :id";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":id", $bien->getId());
        $request->bindValue(":titre", $bien->getTitre());
        $request->bindValue(":codePostal", $bien->getCodePostal());
        $request->bindValue(":ville", $bien->getVille());
        $request->bindValue(":nbPieces", $bien->getnbPieces());
        $request->bindValue(":surface", $bien->getSurface());
        $request->bindValue(":style", $bien->getStyle());
        $request->bindValue(":parking", $bien->getParking());
        $request->bindValue(":garage", $bien->getGarage());
        $request->bindValue(":prixVente", $bien->getPrixVente());
        $request->bindValue(":loyerHC", $bien->getLoyerHC());
        $request->bindValue(":loyerCC", $bien->getLoyerCC());
        $request->bindValue(":consommation", $bien->getConsommation());
        $request->bindValue(":zone", $bien->getZone());
        $request->bindValue(":ascenseur", $bien->getAscenseur());
        $request->bindValue(":etage", $bien->getEtage());
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