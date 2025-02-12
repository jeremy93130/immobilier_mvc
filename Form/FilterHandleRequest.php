<?php

namespace Form;

use Model\Repository\BienRepository;

class FilterHandleRequest extends BaseHandleRequest
{
    private BienRepository $bienRepository;

    public function __construct()
    {
        $this->bienRepository = new BienRepository;
    }
    public function recherche()
    {
        // d_die($_POST);
        // $requete = $_POST;
        // $tabAjax = json_decode($requete, true);
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST)) {
            $parking = isset($_POST['parking']) ? filter_var($_POST['parking'], FILTER_VALIDATE_BOOLEAN) : false;
            $ascenseur = isset($_POST['ascenseur']) ? filter_var($_POST['ascenseur'], FILTER_VALIDATE_BOOLEAN) : false;
            $garage = isset($_POST['garage']) ? filter_var($_POST['garage'], FILTER_VALIDATE_BOOLEAN) : false;
            $jardin = isset($_POST['jardin']) ? filter_var($_POST['jardin'], FILTER_VALIDATE_BOOLEAN) : false;
            $terrasse = isset($_POST['terrasse']) ? filter_var($_POST['terrasse'], FILTER_VALIDATE_BOOLEAN) : false;
            $balcon = isset($_POST['balcon']) ? filter_var($_POST['balcon'], FILTER_VALIDATE_BOOLEAN) : false;
            $piscine = isset($_POST['piscine']) ? filter_var($_POST['piscine'], FILTER_VALIDATE_BOOLEAN) : false;

            $nb_pieces = $_POST['nb_pieces'] ?? null;
            $surface_min = $_POST['surface_min'] ?? null;
            $surface_max = $_POST['surface_max'] ?? null;

            $bienTrouves = $this->bienRepository->findByCriteria($nb_pieces, $surface_min, $surface_max, $parking, $garage, $balcon, $terrasse, $jardin, $piscine, $ascenseur);

            return $bienTrouves;
        } else {
            return false;
        }

    }
}