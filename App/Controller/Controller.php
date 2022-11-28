<?php

namespace App\Controller;

use App\Model\Model as ModelHeader;

abstract class Controller {

    private $_getUser;

    protected function is_Connected() {

        // Recuperer mon user connecté
        $this->_getUser = new ModelHeader;
        $user = $this->_getUser->getUser();

        // Création de tableau de données
        $arrayUserConnected = [
            'user' => $user,
        ];

        $this->render($arrayUserConnected, 'header');
    }


    // Render() -> récupérer mes données et les transmettre a la view voulu
    // Si $data est définis, Je commence la mise en mémoire tampon de mes données   ob_start();
    // J'extrait les données de $data
    // Je ferme la mémoire tampon  ob_get_clean();
    // Je require ma view
    protected function render($data, $view) {
        if (isset($data)) {
            ob_start();
            extract($data);
            ob_get_clean();
            require_once ROOT.'/App/Views/'.$view.'.php';
        } else {
            throw new \Exception("Données ".$data." introuvables", 1);
        }
    }
}

?>