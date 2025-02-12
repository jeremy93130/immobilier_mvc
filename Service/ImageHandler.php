<?php

namespace Service;

use Service\Session as Sess;

class ImageHandler
{
    public static function handlePhoto($entity)
    {
        $fileType = ["jpg", "jpeg", "png", "gif", "svg", "webp"];
        // Emplacement où vous souhaitez enregistrer le fichier
        $target_dir = UPLOAD_BIENS_IMG;
        // Construire un nom de fichier unique en ajoutant un horodatage au nom d'origine
        $originalFileName = basename($_FILES["image"]["name"]);
        $timestamp = time(); // Utilisation de l'horodatage actuel
        $uniqueFileName = $timestamp . "_" . $originalFileName;
        $target_file = $target_dir . $uniqueFileName;
        // Obtenir le type de l'image
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une image JPEG
        if (!in_array($imageFileType, $fileType)) {
            Sess::addMessage("errors", "Seules les images de types JPEG, png, gif et svg sont autorisées.");
        } else {
            // Vérifier la taille de l'image (par exemple, 1 Mo)
            if ($_FILES["image"]["size"] > 10000000) {
                Sess::addMessage("errors", "L'image est trop volumineuse. La taille maximale autorisée est de 10 Mo.");
            } else {
                // Déplacer le fichier téléversé vers le répertoire cible
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $entity->setImage($uniqueFileName);
                Sess::addMessage("succes", "L'image a été téléversée avec succès.");
            }
        }
    }
}