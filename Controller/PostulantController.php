<?php

/**
 * Summary of namespace Controller
 */

namespace Controller;

use Form\PostulantHandleRequest;
use Model\Entity\Postulant;
use Model\Repository\PostulantRepository;

/**
 * Summary of UserController
 */
class PostulantController extends BaseController
{
    private PostulantRepository $postulantRepository;
    private PostulantHandleRequest $form;
    private Postulant $postulant;

    public function __construct()
    {
        $this->postulantRepository = new PostulantRepository;
        $this->form = new PostulantHandleRequest;
        $this->postulant = new Postulant;
    }

    public function list()
    {
        $postulants = $this->postulantRepository->findAll($this->postulant);

        $this->render("user/index.html.php", [
            "h1" => "Liste des utilisateurs",
            "users" => $postulants
        ]);
    }

    public function new()
    {
        $user = $this->postulant;
        $this->form->handleInsertFormPostulant($user);

        if ($this->form->isSubmitted() && $this->form->isValid()) {

            $this->postulantRepository->insertPostulant($user);
            return redirection(addLink("home"));
        }

        $errors = $this->form->getErrorsForm();

        return $this->render("user/form.html.php", [
            "h1" => "Page d'inscription",
            "user" => $user,
            "errors" => $errors
        ]);
    }

    /**
     * Summary of edit
     * @param mixed $id
     * @return void
     */
    public function edit($id)
    {
        if (!empty($id) && is_numeric($id) && $this->getUser()) {

            /**
             * @var Postulant
             */
            $user = $this->getUser();

            $this->form->handleEditFormPostulant($user);

            if ($this->form->isSubmitted() && $this->form->isValid()) {
                $this->postulantRepository->updateUser($user);
                return redirection(addLink("home"));
            }

            $errors = $this->form->getErrorsForm();
            return $this->render("user/form.html.php", [
                "h1" => "Update de l'utilisateur n° $id",
                "user" => $user,
                "errors" => $errors
            ]);
        }
        return redirection("/errors/404.php");
    }

    public function delete($id)
    {
        if (!empty($id) && $id && $this->getUser()) {
            if (is_numeric($id)) {

                $user = $this->postulant;
            } else {
                $this->setMessage("danger", "ERREUR 404 : la page demandé n'existe pas");
            }
        } else {
            $this->setMessage("danger", "ERREUR 404 : la page demandé n'existe pas");
        }

        $this->render("user/form.html.php", [
            "h1" => "Suppresion de l'user n°$id ?",
            "user" => $user,
            "mode" => "suppression"
        ]);
    }

    public function show($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $user = $this->postulant;
            } else {
                $this->setMessage("danger", "Erreur 404 : cette page n'existe pas");
            }
        } else {
            $this->setMessage("danger", "Erreur 403 : vous n'avez pas accès à cet URL");
            redirection(addLink("user", "list"));
        }

        $this->render("user/show.html.php", [
            "user" => $user,
            "h1" => "Fiche user"
        ]);
    }

    public function login()
    {

        if ($this->isUserConnected()) {
            /**
             * @var Postulant
             */
            $user = $this->getUser();

            $this->setMessage("erreur", $user->getFirstname() . " , vous êtes déjà connecté");
            return redirection(addLink("home"));
        }

        $this->form->handleLogin();

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            /**
             * @var Postulant
             */
            $user = $this->getUser();
            $this->setMessage("success", "Bonjour " . $user->getFirstname() . ", vous êtes connecté");
            redirection(addLink("home"));
            return redirection(addLink("home"));
        }

        $errors = $this->form->getErrorsForm();

        return $this->render("security/login.html.php", [
            "h1" => "Entrez vos identifiants de connexion",
            "errors" => $errors

        ]);
    }

    public function logout()
    {
        $this->disconnection();
        $this->setMessage("success", "Vous êtes déconnecté");
        redirection(addLink("home"));
    }
}
