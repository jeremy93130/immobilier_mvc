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
        $this->userRepository = new PostulantRepository;
    }

    public function handleInsertFormPostulant(Postulant $postulant)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            extract($_POST);
            $errors = [];

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
                $postulant->setTelephone($phone);
                $postulant->setPassword($password);
                $postulant->setEmail($email);
                $postulant->setBirthday($birthday);
                if (isset($role)) {
                    $postulant->setRole($role);
                } else {
                    $postulant->setRole('non');
                }
                return $this;
            }
            $this->setErrorsForm($errors);
            return $this;
        }
    }

    public function handleEditFormPostulant($postulant)
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
                $user = $this->userRepository->loginUser($email);
                var_dump($user);
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
