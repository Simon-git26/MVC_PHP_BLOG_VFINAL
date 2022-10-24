<?php

namespace App\Controller;

abstract class Controller {

    // Ma fonction renderer pour aller chercher les infos de mes données et les transmettre au template (view) voulu
    // Si $data est définis, Je commence la mise en mémoire tampon de mes données   ob_start();
    // J'extrait les données de $data
    // Je ferme la mémoire tampon  ob_get_clean();
    // Je require ma view
    protected function renderer($data, $template) {
        if (isset($data)) {
            ob_start();
            extract($data);
            ob_get_clean();
            require_once ROOT.'/App/Views/'.$template.'.php';
        } else {
            throw new \Exception("Données ".$data." introuvables", 1);
        }
    }
}

?>