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
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['formulaire_filtre'])) {
            extract($_POST);

            $nb_pieces = $nb_pieces ?? null;
            $surface_min = $surface_min ?? null;
            $surface_max = $surface_max ?? null;
            $garage = $garage ?? null;
            $parking = $parking ?? null;
            $ascenseur = $ascenseur ?? null;

            $bienTrouves = $this->bienRepository->findByCriteria($nb_pieces, $surface_min, $surface_max, $parking, $garage, $ascenseur);

            return $bienTrouves;
        } else {
            return false;
        }

    }
}