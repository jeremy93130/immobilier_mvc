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
        $sql = "INSERT INTO bien (titre,description, code_postal,ville,nb_pieces,surface,style,parking,garage,prix_vente,loyer_HC,loyer_CC,consommation,zone,ascenseur,etage,image,achat_location) VALUES (:titre, :description, :code_postal, :ville, :nb_pieces, :surface, :style, :parking,:garage,:prix_vente,:loyer_HC,:loyer_CC,:consommation,:zone,:ascenseur,:etage,:image,:achat_location)";
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
                SET titre = :titre, description = :description, code_postal = :codePostal, ville = :ville, nb_pieces = :nbPieces,surface= :surface, style = :style, parking = :parking,garage = :garage, prix_vente = :prixVente,loyer_HC = :loyerHC, loyer_CC = :loyer_CC,consommation = :consommation, zone = :zone,ascenseur = :ascenseur, etage = :etage, image = :image, achat_location = :achat_location
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

    public function findByNbPieces($nb_pieces)
    {
        $sql = "SELECT * FROM bien WHERE nb_pieces = :nb_pieces";

        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(':nb_pieces', $nb_pieces);

        $success = $request->execute();
        if ($success) {
            $biensTrouves = $request->fetchAll(PDO::FETCH_ASSOC);
            return $biensTrouves;
        } else {
            return false;
        }
    }
    public function findBySurface($surface_min, $surface_max)
    {
        $sql = "SELECT * FROM bien WHERE 1=1";

        if (!empty($surface_min)) {
            $sql .= " AND surface >= :surface_min";
        }

        if (!empty($surface_max)) {
            $sql .= " AND surface <= :surface_max";
        }

        $request = $this->dbConnection->prepare($sql);

        if (!empty($surface_min)) {
            $request->bindValue(':surface_min', $surface_min);
        }

        if (!empty($surface_max)) {
            $request->bindValue(':surface_max', $surface_max);
        }

        $success = $request->execute();
        if ($success) {
            $biensTrouves = $request->fetchAll(PDO::FETCH_ASSOC);
            return $biensTrouves;
        } else {
            return false;
        }
    }

    public function findByCriteria($nb_pieces, $surface_min, $surface_max, $parking, $garage, $ascenseur)
    {
        $sql = "SELECT * FROM bien WHERE 1=1";

        if ($nb_pieces !== null) {
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
        if ($surface_min !== null) {
            $sql .= " AND surface >= :surface_min";
        }

        if ($surface_max !== null) {
            $sql .= " AND surface <= :surface_max";
        }

        $request = $this->dbConnection->prepare($sql);

        if ($nb_pieces !== null) {
            $request->bindValue(':nb_pieces', $nb_pieces);
        }
        if ($surface_min !== null) {
            $request->bindValue(':surface_min', $surface_min);
        }
        if ($surface_max !== null) {
            $request->bindValue(':surface_max', $surface_max);
        }

        $success = $request->execute();

        if ($success) {
            $données = $request->fetchAll(PDO::FETCH_ASSOC);
            return $données;
        } else {
            return false;
        }
    }
}