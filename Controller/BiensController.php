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
    public function detailBien(BienRepository $bien,$id){

        $bienDetail = $bien->findById($bien,$id);
        $this->render('admin/biens.html.php',[
            'bien'
        ]);
    }
}
