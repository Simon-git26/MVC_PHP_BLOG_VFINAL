<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelHeader;


class HeaderController extends Controller {
    
    private $_header;

    // Envoi de mes infos user à ma view header
    public function getBddData() {
       
        // Recuperer mon user connecté
        $this->_header = new ModelHeader;
        $usernames = $this->_header->getUser();


        // Création de tableau de données
        $arrayVariableHeader = [
            'usernames' => $usernames,
        ];

        $this->render($arrayVariableHeader, 'header');
    }
}