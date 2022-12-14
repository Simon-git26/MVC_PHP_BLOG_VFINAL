<?php
session_start();
 
if(!isset($_SESSION['ip']))
{
  // On attribue pour cette session l'adresse IP,
  // si elle n'est pas encore attribuée
  $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
}
 
// On vérifie si l'adresse IP a changé
// « par magie » (= vol de session)
if($_SESSION['ip']!=$_SERVER['REMOTE_ADDR'])
{
  // Si c'est le cas, on redirige vers une page d'erreur
  header('Location: 403.php?error=wrong_ip');
 
  // On détruit la session par sécurité (facultatif)
  $_SESSION = array();
  exit;
}



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


$page = '';
// Appeler la methode voulu
$method = 'showView';



// Si @param page est definis, alors sa valeur sera la valeur du param url
// if isset($_GET['page']) && $_GET['page'] === home ou login etc
switch (isset($_GET['page']) && $_GET['page']) {
    case 'home'         : $page = $_GET['page'];
    case 'login'        : $page = $_GET['page'];
    case 'post'         : $page = $_GET['page'];
    case 'register'     : $page = $_GET['page'];
    case 'blog'         : $page = $_GET['page'];
    case 'create'       : $page = $_GET['page'];
    case 'edit'         : $page = $_GET['page'];
    case 'contact'      : $page = $_GET['page'];
    case 'delete'       : $page = $_GET['page'];
    case 'admin'        : $page = $_GET['page'];
}


if (isset($_GET['method'])) {
    $method = $_GET['method'];
}


// Definir dynamiquement mon chemin pour le controlleur voulu
$nameController = 'App\Controller\\'.ucfirst($page).'Controller';
$controller = new $nameController;

// Appel de ma method
$controller->$method();