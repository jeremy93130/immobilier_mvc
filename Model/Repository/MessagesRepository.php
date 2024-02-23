<?php

namespace Model\Repository;

use Model\Entity\Messages;
use Service\Session;

class MessagesRepository extends BaseRepository
{

    public function insertMessage(Messages $messages)
    {
        $email = Session::getUserConnected()->getEmail();

        $sql = "INSERT INTO messages (message,email,postulant_id,telephone) VALUES (:message,:email,:postulant_id,:telephone)";

        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(':message', $messages->getMessage());
        $request->bindValue(':email', $email);
        $request->bindValue(':postulant_id', $messages->getPostulantId());
        $request->bindValue(':telephone', $messages->getTelephone());

        $request = $request->execute();

        if ($request) {
            Session::addMessage('success', "Le message a été envoyé avec succès");
            return true;
        } else {
            Session::addMessage('danger', "Erreur : Le message n'a pas pu être envoyé");
            return false;
        }
    }

    public function updateMessage(Messages $messages)
    {
        $sql = "UPDATE messages set message = :message, postulant_id = :postulant_id, date_message = :date_message, telephone = :telephone WHERE id = :id";

        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(':id', $messages->getId());
        $request->bindValue(':message', $messages->getMessage());
        $request->bindValue(':postulant_id', $messages->getPostulantId());
        $request->bindValue(':telephone', $messages->getTelephone());

        $request = $request->execute();

        if ($request) {
            Session::addMessage('success', 'La mise à jour du message à bien été executée');
            return true;
        } else {
            Session::addMessage('Erreur', 'La mise à jour du message n\'a pas pu être executée correctement');
            return false;
        }
    }
}