<?php

namespace Model\Repository;

use PDO;
use Service\Session;
use Model\Entity\Bien;

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
        $sql = "INSERT INTO bien (titre,description, code_postal,ville,nb_pieces,surface,style,parking,garage,prix_vente,loyer_HC,loyer_CC,consommation,zone,ascenseur,jardin,terrasse,balcon,piscine,etage,image,achat_location) VALUES (:titre, :description, :code_postal, :ville, :nb_pieces, :surface, :style, :parking,:garage,:prix_vente,:loyer_HC,:loyer_CC,:consommation,:zone,:ascenseur,:jardin,:terrasse,:balcon,:piscine,:etage,:image,:achat_location)";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":titre", $bien->getTitre());
        $request->bindValue(":description", $bien->getDescription());
        $request->bindValue(":code_postal", $bien->getCodePostal());
        $request->bindValue(":ville", $bien->getVille());
        $request->bindValue(":nb_pieces", $bien->getnbPieces());
        $request->bindValue(":surface", $bien->getSurface());
        $request->bindValue(":style", $bien->getStyle());
        $request->bindValue(":parking", $bien->getParking());
        $request->bindValue(":garage", $bien->getGarage());
        $request->bindValue(":jardin", $bien->getJardin());
        $request->bindValue(":terrasse", $bien->getTerrasse());
        $request->bindValue(":balcon", $bien->getBalcon());
        $request->bindValue(":piscine", $bien->getPiscine());
        $request->bindValue(":prix_vente", $bien->getPrixVente());
        $request->bindValue(":loyer_HC", $bien->getLoyerHC());
        $request->bindValue(":loyer_CC", $bien->getLoyerCC());
        $request->bindValue(":consommation", $bien->getConsommation());
        $request->bindValue(":zone", $bien->getZone());
        $request->bindValue(":ascenseur", $bien->getAscenseur());
        $request->bindValue(":etage", $bien->getEtage());
        $request->bindValue(":image", $bien->getImage());
        $request->bindValue(":achat_location", $bien->getAchatLocation());

        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "Le nouveau bien a bien été enregistré");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : le bien n'a pas été enregistré");
            return false;
        }
    }


    public function updateBien(Bien $bien)
    {
        $sql = "UPDATE bien 
                SET titre = :titre, description = :description, code_postal = :codePostal, ville = :ville, nb_pieces = :nbPieces,surface= :surface, style = :style, parking = :parking,garage = :garage, prix_vente = :prixVente,loyer_HC = :loyerHC, loyer_CC = :loyer_CC,consommation = :consommation, zone = :zone,ascenseur = :ascenseur,jardin = :jardin, terrasse = :terrasse, balcon = :balcon, piscine = :piscine, etage = :etage, image = :image, achat_location = :achat_location
                WHERE id = :id";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":id", $bien->getId());
        $request->bindValue(":titre", $bien->getTitre());
        $request->bindValue(":description", $bien->getDescription());
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
        $request->bindValue(":jardin", $bien->getJardin());
        $request->bindValue(":terrasse", $bien->getTerrasse());
        $request->bindValue(":balcon", $bien->getBalcon());
        $request->bindValue(":piscine", $bien->getPiscine());
        $request->bindValue(":etage", $bien->getEtage());
        $request->bindValue(":image", $bien->getImage());
        $request->bindValue(":achat_location", $bien->getAchatLocation());
        $request = $request->execute();
        if ($request) {
            Session::addMessage("success", "La mise à jour de l'utilisateur a bien été éffectuée");
            return true;
        } else {
            Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été mise à jour");
            return false;
        }
    }

    public function findByCriteria($nb_pieces, $surface_min, $surface_max, $parking, $garage, $ascenseur, $jardin, $terrasse, $balcon, $piscine)
    {
        $sql = "SELECT * FROM bien WHERE 1=1";

        if ($nb_pieces !== null && $nb_pieces !== "") {
            $sql .= " AND nb_pieces = :nb_pieces";
        }

        if ($parking !== null) {
            $sql .= " AND parking = 'oui'";
        }
        if ($garage !== null) {
            $sql .= " AND garage = 'oui'";
        }
        if ($ascenseur !== null) {
            $sql .= " AND ascenseur = 'oui'";
        }
        if ($jardin !== null) {
            $sql .= " AND jardin = 'oui'";
        }
        if ($terrasse !== null) {
            $sql .= " AND terrasse = 'oui'";
        }
        if ($balcon !== null) {
            $sql .= " AND balcon = 'oui'";
        }
        if ($piscine !== null) {
            $sql .= " AND piscine = 'oui'";
        }
        if ($surface_min !== null && $surface_min !== "") {
            $sql .= " AND surface >= :surface_min";
        }

        if ($surface_max !== null && $surface_max !== "") {
            $sql .= " AND surface <= :surface_max";
        }

        $request = $this->dbConnection->prepare($sql);

        if ($nb_pieces !== null && $nb_pieces !== "") {
            $request->bindValue(':nb_pieces', $nb_pieces);
        }
        if ($surface_min !== null && $surface_min !== "") {
            $request->bindValue(':surface_min', $surface_min);
        }
        if ($surface_max !== null && $surface_max !== "") {
            $request->bindValue(':surface_max', $surface_max);
        }
        $success = $request->execute();

        if ($success) {
            $données = $request->fetchAll(PDO::FETCH_ASSOC);
            return $données;
        } else {
            var_dump($request->errorInfo());
            return false;
        }
    }
}