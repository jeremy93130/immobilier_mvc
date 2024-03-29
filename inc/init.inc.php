<?php

/* ⚠ Il faut inclure le fichier autoload AVANT d'exécuter la fonction session_start() sinon il y aura
        une error si on essaye de stocker un objet dans la variable superglobale $_SESSION */
require "autoload.php";
session_start();
include __DIR__ . "/functions.inc.php";
define("ROOT", "/immobilier_mvc/");
define("POSTULANT", "non");
define("ADMIN", "oui");
define("INSERTED", "Enregistrer");
define("UPDATED", "Modifier");
define("DELETED", "Supprimer");
define("UPLOAD_BIENS_IMG", "uploads/biens/");
define("UPLOAD_LOGO_IMG", "uploads/logos/");
define("EN_ATTENTE", "En Attente");