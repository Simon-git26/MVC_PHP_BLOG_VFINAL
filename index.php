<?php
session_start();
?>

<pre>
    <?php
        echo 'DEBUG pour la SESSION';
        echo '</br>';
        var_dump($_SESSION);
        echo '</br>';
        echo '</br>';
        $_SESSION['role'] = 'administrateur';
        echo '</br>';
    ?>
</pre>
<?php



// PB sur session qui ne se garde pas ouverte
// Attention quand je post commentaire, rajout system verif admin +++ verif si user qui post comment existe en base ET est celui qui est connecté
// Sur la page permettant de modifier un blog post, l’utilisateur a la possibilité de modifier les champs titre, chapô, auteur et contenu.

// Ajouter page permettant de modifier supprimer post pour admin





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
// http://localhost/MVC_PHP_BLOG_VFINAL/?page=register

// Partie Boulot
// http://localhost:8080/my-app/MVC_PHP_BLOG_VFINAL/?page=register



// Inclure mon autoloader
Require_once ROOT.'/App/Autoloader.php';
// spl_autoload dans mon Autoloader.php()
App\Autoloader::spl_autoload();



$page = '';
// Appéler la methode voulu, definit dans le HomeController
$method = 'getBddData';



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