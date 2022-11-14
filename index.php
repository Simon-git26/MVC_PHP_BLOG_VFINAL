<?php

// ******* Création de branche selon les issues *****

// Pour crée une branch qui contient mes modifs, donc mon issue,
// Je fait git branch nom de la branch
// git checkout nouvelle branch
// git add . / commit / push origin

// Je suis sur la branche SystemeAuthentification
// Une fois mon travail sur l'authentification terminer,
// je retournerais sur master avec git checkout master
// et la je ferait un git merge SystemeAuthentification
// pour fusionner ma branche authentification avec ma master et ainsi de suite
// et ensuite faire un git push



// Initialiser la session
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
/*
if(!isset($_SESSION["username"])){
    header("Location: ?page=login");
}
*/


// Affichage All de mes erreurs
ini_set('display_error', 'On');
error_reporting(E_ALL);


// Définir  ma root racine du projet
define('ROOT', dirname(__DIR__.'/MVC_PHP_BLOG_VFINAL'));

// echo ROOT;




// Route de connection de register
// http://localhost/MVC_PHP_BLOG_VFINAL/App/Views/register.php

// Partie Boulot
// http://localhost:8080/my-app/MVC_PHP_BLOG_VFINAL/aPP/Views/register.php



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