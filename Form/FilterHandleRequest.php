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
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['data'])) {
            extract($_POST);
            $parking = filter_var($data['parking'], FILTER_VALIDATE_BOOLEAN);
            $ascenseur = filter_var($data['ascenseur'], FILTER_VALIDATE_BOOLEAN);
            $garage = filter_var($data['garage'], FILTER_VALIDATE_BOOLEAN);
            $jardin = filter_var($data['jardin'], FILTER_VALIDATE_BOOLEAN);
            $terrasse = filter_var($data['terrasse'], FILTER_VALIDATE_BOOLEAN);
            $balcon = filter_var($data['balcon'], FILTER_VALIDATE_BOOLEAN);
            $piscine = filter_var($data['piscine'], FILTER_VALIDATE_BOOLEAN);

            $nb_pieces = $data['nb_pieces'] ?? null;
            $surface_min = $data['surface_min'] ?? null;
            $surface_max = $data['surface_max'] ?? null;

            $bienTrouves = $this->bienRepository->findByCriteria($nb_pieces, $surface_min, $surface_max, $parking, $garage, $balcon, $terrasse, $jardin, $piscine, $ascenseur);

            return $bienTrouves;
        } else {
            return false;
        }

    }
}