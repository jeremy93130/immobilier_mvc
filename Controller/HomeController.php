<?php

namespace Controller;

use Form\BienHandleRequest;
use Controller\BaseController;
use Model\Entity\Bien;
use Model\Repository\BienRepository;
use Service\Session;

class HomeController extends BaseController
{
    private BienRepository $bienRepository;
    private BienHandleRequest $form;
    private Bien $bien;

    public function __construct()
    {
        $this->bienRepository = new BienRepository;
        $this->form = new BienHandleRequest;
        $this->bien = new Bien;
    }
    public function list()
    {
        $biens = $this->bienRepository->findAll($this->bien);
        $this->render("home.html.php", [
            "h1" => "Bien Chez Moi",
            "biens" => $biens
        ]);
    }
}
