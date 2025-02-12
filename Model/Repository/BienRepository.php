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

    public function findByCriteria(array $datas)
    {
        $sql = "SELECT * FROM bien WHERE 1=1";
        $params = [];


        foreach ($datas as $key => $value) {
            if ($value !== "") {
                switch ($key) {
                    case 'surfaceMin':
                        $sql .= " AND surface >= :surfaceMin";
                        $params[":$key"] = $value;
                        break;
                    case 'surfaceMax':
                        $sql .= " AND surface <= :surfaceMax";
                        $params[":$key"] = $value;
                        break;
                    default:
                        $sql .= " AND $key = :$key";
                        $params[":$key"] = $value;
                        break;
                }
            }
        }

        $request = $this->dbConnection->prepare($sql);

        foreach ($params as $param => $val) {
            $request->bindValue($param, $val);
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
