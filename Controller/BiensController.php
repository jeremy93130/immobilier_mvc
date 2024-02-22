<?php

namespace Controller;

use Form\BienHandleRequest;
use Controller\BaseController;
use Model\Entity\Bien;
use Model\Repository\BienRepository;

class BiensController extends BaseController
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
    public function detailBien($id)
    {
        $bienDetail = $this->bienRepository->findById($this->bien, $id);
        $this->render('biens/show.html.php', [
            'bien' => $bienDetail,
        ]);
    }
}
