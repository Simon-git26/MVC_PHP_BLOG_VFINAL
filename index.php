<?php

// Affichage All de mes erreurs
ini_set('display_error', 'On');
error_reporting(E_ALL);


// Définir  ma root racine du projet
define('ROOT', dirname(__DIR__.'/MVC_PHP_BLOG_VFINAL'));

// echo ROOT;

// Inclure mon autoloader
Require_once ROOT.'/App/Autoloader.php';
// spl_autoload dans mon Autoloader.php()
App\Autoloader::spl_autoload();


// Si @param page n'est pas definis, par default il sera a home
$page = '';
// Appéler la methode voulu, definit dans le HomeController
$method = 'getBddData';

// $action = 'post';


// Si @param page est definis, alors sa valeur sera la valeur du param url
if (isset($_GET['page']) && $_GET['page'] === 'home') {
    $page = $_GET['page'];
} else if (isset($_GET['page']) &&  $_GET['page'] === 'login') {
    $page = $_GET['page'];
}


if (isset($_GET['method'])) {
    $method = $_GET['method'];
}



// Definir dynamiquement mon chemin pour le controlleur voulu
$nameController = 'App\Controller\\'.ucfirst($page).'Controller';
$controller = new $nameController;

// Appel de ma method DataBdd
$controller->$method();