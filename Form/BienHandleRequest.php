<?php

namespace Form;

use Service\ImageHandler;
use Service\Session as Sess;
use Model\Entity\Bien;
use Model\Repository\BienRepository;

class BienHandleRequest extends BaseHandleRequest
{
    private $bienRepository;

    private $imageTraitement;
    public function __construct()
    {
        $this->bienRepository = new BienRepository;
        $this->imageTraitement = new ImageHandler;
    }

    public function handleInsertFormBien(Bien $bien)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajout_bien'])) {

            extract($_POST);
            $errors = [];

            // d_die($_POST);

            // Vérification de la validité du formulaire
            if (empty($titre)) {
                $errors[] = "Le titre ne peut pas être vide";
            }

            $this->imageTraitement->handlePhoto($bien);

            if (empty($errors)) {
                $bien->setTitre($titre);
                $bien->setDescription($description);
                $bien->setStyle($style);
                $bien->setnbPieces($nb_pieces);
                $bien->setSurface($surface);
                $bien->setCodePostal($code_postal);
                $bien->setVille($ville);
                $bien->setZone($zone);
                $bien->setPrixVente($vente);
                $bien->setLoyerHC($hc);
                $bien->setLoyerCC($cc);
                $bien->setParking($parking);
                $bien->setGarage($garage);
                $bien->setAscenseur($ascenseur);
                $bien->setConsommation($consommation);
                $bien->setEtage($etage);
                $bien->setAchatLocation($achat_location);
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
