<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Messages;
use Model\Repository\MessagesRepository;

class MessagesHandleRequest extends BaseHandleRequest
{
    private $messageRepository;
    private $session;

    public function __construct()
    {
        $this->messageRepository = new MessagesRepository;
        $this->session = Sess::getUserConnected();
    }

    public function handleInsertFormMessages(Messages $messages)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            $errors = [];
            if (Sess::isConnected()) {
                if (!empty($message)) {
                    if (strlen($message) > 300) {
                        $errors[] = "Vous avez dépassé les 300 caractères, merci de raccourcir votre message";
                    }
                    if (strlen($message) == 0) {
                        $errors[] = "Merci d'écrire un message, vous avez laissé le champs vide";
                    }
                }

                if (empty($errors)) {
                    $messages->setMessage($message)
                        ->setPostulantId($this->session->getId())
                        ->setTelephone($telephone);
                    Sess::addMessage('success', "Votre message a bien été envoyé");
                } else {
                    Sess::addMessage('erreur', "Votre message n'a pas pu être envoyé");
                }
                return $this;
            } else {
                $errors[] = "Merci de vous connecter avant d'envoyer un message";
                redirection("security/login.html.php");
            }
        }
    }
}