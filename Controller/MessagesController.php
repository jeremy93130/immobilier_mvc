<?php

namespace Controller;

use Model\Entity\Bien;
use Model\Entity\Messages;
use Form\MessagesHandleRequest;
use Model\Repository\BienRepository;
use Model\Repository\MessagesRepository;

class MessagesController extends BaseController
{
    private BienRepository $bienRepository;
    private Bien $bien;
    private MessagesHandleRequest $form;
    private MessagesRepository $messagesRepository;

    public function __construct()
    {
        $this->form = new MessagesHandleRequest;
        $this->bienRepository = new BienRepository;
        $this->messagesRepository = new MessagesRepository;
        $this->bien = new Bien;
    }


    public function message($idBien)
    {
        $bienDetail = $this->bienRepository->findById($this->bien, $idBien);
        $messages = new Messages;

        $this->form->handleInsertFormMessages($messages);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->messagesRepository->insertMessage($messages);
        }
        $this->render('biens/show.html.php', [
            'bien' => $bienDetail,
        ]);
    }
}