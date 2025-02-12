<?php

namespace Controller\Admin;

use Controller\BaseController;
use Model\Entity\Postulant;
use Model\Repository\PostulantRepository;

class PostulantController extends BaseController
{
    private Postulant $postulant;
    private PostulantRepository $postulantRepository;

    public function __construct(){
        $this->postulant = new Postulant;
        $this->postulantRepository = new PostulantRepository;
    }
    public function index()
    {
        $users = $this->postulantRepository->findAll($this->postulant);
        return $this->render('admin/postulants/index.html.php', [
            'users' => $users
        ]);
    }
}
