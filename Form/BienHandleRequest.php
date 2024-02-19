<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Bien;
use Model\Repository\BienRepository;

class BienHandleRequest extends BaseHandleRequest
{
    private $bienRepository;

    public function __construct()
    {
        $this->bienRepository  = new BienRepository;
    }

    public function handleInsertForm(Bien $bien)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            extract($_POST);
            $errors = [];

            // Vérification de la validité du formulaire
            if (empty($titre)) {
                $errors[] = "Le titre ne peut pas être vide";
            }
            if (strlen($titre) < 4) {
                $errors[] = "Le titre doit avoir au moins 4 caractères";
            }

            if (!strpos($titre, " ") === false) {
                $errors[] = "Les espaces ne sont pas autorisés pour le titre";
            }


            if (empty($errors)) {
                $bien->setTitre($titre);
                $bien->setCodePostal($codePostal);
                $bien->setAscenseur($ascenseur);
                $bien->setConsommation($consommation);
                $bien->setEtage($etage);
                $bien->setGarage($garage);
                $bien->setImage($image);
                $bien->setLoyerCC($loyer);
                $bien->setLoyerHC($loyer);
                $bien->setnbPieces($nbPieces);
                $bien->setParking($parking);
                $bien->setPrixVente($prix);
                $bien->setStyle($style);
                $bien->setSurface($surface);
                $bien->setVille($ville);
                $bien->setZone($zone);
                return $this;
            }
            $this->setErrorsForm($errors);
            return $this;
        }
    }

    public function handleEditForm($bien)
    {
    }
}
