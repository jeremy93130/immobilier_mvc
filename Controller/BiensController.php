<?php

namespace Controller;

use Model\Entity\Bien;
use Form\BienHandleRequest;
use Controller\BaseController;
use Form\MessagesHandleRequest;
use Model\Entity\Messages;
use Model\Repository\BienRepository;
use Model\Repository\MessagesRepository;

class BiensController extends BaseController
{
    private BienRepository $bienRepository;
    private Bien $bien;
    private MessagesHandleRequest $form;
    private MessagesRepository $messagesRepository;

    public function __construct()
    {
        $this->bienRepository = new BienRepository;
        $this->bien = new Bien;
        $this->form = new MessagesHandleRequest;
        $this->messagesRepository = new MessagesRepository;
    }
    public function detailBien($id)
    {
        $bienDetail = $this->bienRepository->findById($this->bien, $id);
        $messages = new Messages;

        $this->form->handleInsertFormMessages($messages);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->messagesRepository->insertMessage($messages);
            $this->redirectToRoute(['biens', 'detailBien', $id]);
            return;
        }
        $this->render('biens/show.html.php', [
            'h1' => "details de " . $bienDetail->getTitre(),
            'bien' => $bienDetail,
        ]);
    }

    public function demandes($id)
    {
        $bien = $this->bienRepository->findById($this->bien, $id);

        $this->render('formulaires/demandes.html.php', [
            'h1' => "formulaire de demande logement"
        ]);
    }
}
