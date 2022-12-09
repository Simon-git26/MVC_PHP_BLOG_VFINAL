<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelCreate;


class CreateController extends Controller {
    private $_user;


    // Instance de Model et recupération de getPosts() / getUser()
    public function showView() {
        $this->showViewHeader();
       

        // Recuperer mon user connecté
        $this->_user = new ModelCreate;
        $getUser = $this->_user->getUser();

        // Création de tableau de données
        $arrayDataHome = [
            'getUser' => $getUser,
        ];

        $this->render($arrayDataHome, 'createPost');
    }
}