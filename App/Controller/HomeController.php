<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelHome;


class HomeController extends Controller {
    private $_getPosts;
    private $_getUser;


    // Instance de Model et recupération de getPosts() / getUser()
    public function showView() {
       
        // Recuperer tous mes posts
        $this->_getPosts = new ModelHome;
        $posts = $this->_getPosts->getPosts();


        // Recuperer mon user connecté
        $this->_getUser = new ModelHome;
        $user = $this->_getUser->getUser();

        // Création de tableau de données
        $arrayDataHome = [
            'posts' => $posts,
            'user' => $user,
        ];

        $this->render($arrayDataHome, 'home');
    }
}