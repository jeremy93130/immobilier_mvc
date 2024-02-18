<?php
// On génère une constante qui contiendra le chemin vers index.php

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// On charge le model et controller principaux
require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

// On sépare les paramètres
$params = explode('/', $_GET['p']);

// Est-ce qu'un paramètre existe?
if ($params[0] !== '') {
    $controller = ucfirst($params[0]);

    $action = isset($params[1]) ? $params[1] : 'index';

    require_once(ROOT.'controllers/'.$controller.'.php');

    $controller = new $controller();

    if(method_exists($controller,$action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller,$action],$params);
    } else {
        http_response_code(404);
        echo "la page demandée n'existe pas !";
    }
}else{

}
