<?php

namespace App\Controller;

use App\Model\Model as ModelHeader;

abstract class Controller {

    private $_user;

    protected function showViewHeader() {

        // Recuperer mon user connecté
        $this->_user = new ModelHeader;
        $getUser = $this->_user->getUser();

        // Création de tableau de données
        $arrayUserConnected = [
            'getUser' => $getUser,
        ];

        if (isset($_SESSION['auth'])) {
            $this->render($arrayUserConnected, 'header');
        }
    }


    // Render() -> récupérer mes données et les transmettre a la view voulu
    // Si $data est définis, Je commence la mise en mémoire tampon de mes données   ob_start();
    // J'extrait les données de $data
    // Je ferme la mémoire tampon  ob_get_clean();
    // Je require ma view
    protected function render($data, $view) {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] != "") {
            if (isset($data)) {
                ob_start();
                extract($data);
                ob_get_clean();
                require_once ROOT.'/App/Views/'.$view.'.php';
            } else {
                throw new \Exception("Données ".$data." introuvables", 1);
            }
        } else {
            if ($view == "blog" || $view == "login" || $view == "register") {
                if (isset($data)) {
                    ob_start();
                    extract($data);
                    ob_get_clean();
                    require_once ROOT.'/App/Views/'.$view.'.php';
                } else {
                    throw new \Exception("Données ".$data." introuvables", 1);
                }
            } else {
                header("Location: ?page=login");
            }
        }
    }
}

?>