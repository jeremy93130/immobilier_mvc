<?php

namespace Controller;

use Form\BienHandleRequest;
use Controller\BaseController;
use Form\FilterHandleRequest;
use Model\Entity\Bien;
use Model\Entity\Postulant;
use Model\Repository\BienRepository;
use Model\Repository\PostulantRepository;
use Service\Session;

class HomeController extends BaseController
{
    private BienRepository $bienRepository;
    private BienHandleRequest $form;
    private Bien $bien;
    private Postulant $postulant;
    private FilterHandleRequest $formFilter;
    private PostulantRepository $userRepository;

    public function __construct()
    {
        $this->bienRepository = new BienRepository;
        $this->form = new BienHandleRequest;
        $this->bien = new Bien;
        $this->formFilter = new FilterHandleRequest;
        $this->userRepository = new PostulantRepository();
        $this->postulant = new Postulant();
    }
    public function list()
    {
        $biens = $this->bienRepository->findAll($this->bien);
        // //  d_die(Session::getUserConnected());
        return $this->render("home.html.php", [
            "h1" => "Bien Chez Moi",
            "biens" => $biens,
        ]);
    }

    public function filtre()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (empty($data)) {
            echo json_encode(['vide' => true]);
        }
        $newData = [];
        foreach ($data as $key => $d) {
            if (!empty($d)) {
                $newData[$key] = $d;
            }
        }
        $datas = $this->bienRepository->findByCriteria($newData);

        echo json_encode(['bien' => $datas]);
    }
}
