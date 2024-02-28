<?php

namespace Controller;

use Form\BienHandleRequest;
use Controller\BaseController;
use Form\FilterHandleRequest;
use Model\Entity\Bien;
use Model\Repository\BienRepository;
use Service\Session;

class HomeController extends BaseController
{
    private BienRepository $bienRepository;
    private BienHandleRequest $form;
    private Bien $bien;

    private FilterHandleRequest $formFilter;

    public function __construct()
    {
        $this->bienRepository = new BienRepository;
        $this->form = new BienHandleRequest;
        $this->bien = new Bien;
        $this->formFilter = new FilterHandleRequest;
    }
    public function list()
    {
        $resultatForm = $this->formFilter->recherche();
        if ($resultatForm !== false) {
            // Afficher les résultats du formulaire de filtre s'ils existent
            $this->render('biens/list.filtre.html.php', [
                'h1' => "Bien Chez Moi",
                'filtres' => $resultatForm,
            ]);
        } else {
            // Sinon, afficher la page d'accueil avec tous les biens
            $biens = $this->bienRepository->findAll($this->bien);
            $this->render("home.html.php", [
                "h1" => "Bien Chez Moi",
                "biens" => $biens
            ]);
        }
    }
}
