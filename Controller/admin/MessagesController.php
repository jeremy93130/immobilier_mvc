<?php

namespace Controller\Admin;

use Model\Entity\Bien;
use Model\Entity\Messages;
use Form\MessagesHandleRequest;
use Model\Repository\BienRepository;
use Controller\BaseController;
use Model\Repository\MessagesRepository;

class MessagesController extends BaseController
{
    private BienRepository $bienRepository;
    private Bien $bien;
    private MessagesRepository $messagesRepository;
    private Messages $messages;

    public function __construct()
    {
        $this->bienRepository = new BienRepository;
        $this->messagesRepository = new MessagesRepository;
        $this->bien = new Bien;
        $this->messages = new Messages;
    }


    public function list()
    {
        $list = $this->messagesRepository->getMessagesAndUser();
        
        $this->render('admin/messages/list.messages.html.php', [
            "list" => $list,
            "h1" => "Boite de récéption des messages"
        ]);
    }
}