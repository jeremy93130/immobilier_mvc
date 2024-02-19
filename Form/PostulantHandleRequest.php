<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Postulant;
use Model\Repository\PostulantRepository;

class PostulantHandleRequest extends BaseHandleRequest
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository  = new PostulantRepository;
    }

    public function handleInsertForm(Postulant $postulant)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            extract($_POST);
            $errors = [];

            // Vérification de la validité du formulaire
            if (empty($surname)) {
                $errors[] = "Le pseudo ne peut pas être vide";
            }
            if (strlen($surname) < 4) {
                $errors[] = "Le pseudo doit avoir au moins 4 caractères";
            }
            if (strlen($surname) > 20) {
                $errors[] = "Le pseudo ne peut avoir plus de 20 caractères";
            }

            if (!strpos($surname, " ") === false) {
                $errors[] = "Les espaces ne sont pas autorisés pour le pseudo";
            }

            // Est-ce que le surname existe déjà dans la bdd ?

            $userExists = $this->userRepository->checkUserExist($surname, $email);

            //$userExists = $this->userRepository->findByAttributes($user, ["surname" => $surname]);

            if ($userExists) {
                $errors[] = "Le pseudo ou l'email existe déjà, veuillez en choisir un nouveau";
            }

            if (!empty($lastname)) {
                if (strlen($lastname) < 2) {
                    $errors[] = "Le nom doit avoir au moins 2 caractères";
                }
                if (strlen($lastname) > 30) {
                    $errors[] = "Le nom ne peut avoir plus de 30 caractères";
                }
            }
            if (!empty($firstname)) {
                if (strlen($firstname) < 2) {
                    $errors[] = "Le prénom doit avoir au moins 2 caractères";
                }
                if (strlen($firstname) > 30) {
                    $errors[] = "Le prénom ne peut avoir plus de 30 caractères";
                }
            }
            if (empty($password)) {
                $errors[] = "Le mot de passe ne peut pas être vide";
            }


            if (empty($errors)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $postulant->setGender($gender);
                $postulant->setFirstname($firstname);
                $postulant->setLastname($lastname);
                $postulant->setTelephone($telephone);
                $postulant->setPassword($password);
                $postulant->setEmail($email);
                $postulant->setBirthday($birthday);
                $postulant->setJob($job);
                $postulant->setSalaire($salaire);
                if (isset($role)) {
                    $user->setRole($role);
                }
                return $this;
            }
            $this->setErrorsForm($errors);
            return $this;
        }
    }

    public function handleEditForm($postulant)
    {
    }
    public function handleLogin()
    {
        if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST["login"])) {

            extract($_POST);
            $errors = [];
            if (empty($email) || empty($password)) {
                $errors[] = "Veuillez inserer vos coordonnées";
            } else {
                /**
                 * @var Postulant
                 */
                $user = $this->userRepository->loginUser($email,$password);
                if (empty($user)) {
                    $errors[] = "Il n'y a pas d'utilisateur avec cet email";
                } else {
                    if (!password_verify($password, $user->getPassword())) {
                        $errors[] = "Le mot de passe ne correspond pas";
                    }
                }
            }
            if (empty($errors)) {
                Sess::authentication($user);
                return $this;
            }

            $this->setErrorsForm($errors);
            return $this;
        }
    }
}
