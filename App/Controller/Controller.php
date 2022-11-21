<?php

namespace App\Controller;

abstract class Controller {

    // Render() -> récupérer mes données et les transmettre a la view voulu
    // Si $data est définis, Je commence la mise en mémoire tampon de mes données   ob_start();
    // J'extrait les données de $data
    // Je ferme la mémoire tampon  ob_get_clean();
    // Je require ma view
    protected function isConnected() {

    }




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