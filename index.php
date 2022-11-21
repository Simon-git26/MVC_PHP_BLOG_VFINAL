<?php
session_start();
?>

<pre>
        <?php
            echo 'DEBUG pour la SESSION et POST';
            echo '</br>';
            var_dump($_SESSION);
            echo '</br>';
            var_dump($_POST);
            echo '</br>';
        ?>
    </pre>

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



// Affichage All de mes erreurs
ini_set('display_error', 'On');
error_reporting(E_ALL);


// Définir  ma root racine du projet
define('ROOT', dirname(__DIR__.'/MVC_PHP_BLOG_VFINAL'));
// echo ROOT;


// Route de connection de register
// http://localhost/MVC_PHP_BLOG_VFINAL/?page=register

// Partie Boulot
// http://localhost:8080/my-app/MVC_PHP_BLOG_VFINAL/?page=register



// Inclure mon autoloader
Require_once ROOT.'/App/Autoloader.php';
// spl_autoload dans mon Autoloader.php()
App\Autoloader::spl_autoload();



$page = '';
// Appéler la methode voulu, definit dans le HomeController
$method = 'showView';



// Si @param page est definis, alors sa valeur sera la valeur du param url
// if isset($_GET['page']) && $_GET['page'] === home ou login etc
switch (isset($_GET['page']) && $_GET['page']) {
    case 'home'     : $page = $_GET['page'];
    case 'login'    : $page = $_GET['page'];
    case 'post'     : $page = $_GET['page'];
    case 'register' : $page = $_GET['page'];
}



if (isset($_GET['method'])) {
    $method = $_GET['method'];
}


// Definir dynamiquement mon chemin pour le controlleur voulu
$nameController = 'App\Controller\\'.ucfirst($page).'Controller';
$controller = new $nameController;

// Appel de ma method DataBdd
$controller->$method();