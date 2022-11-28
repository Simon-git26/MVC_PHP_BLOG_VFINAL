<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelHome;


class HomeController extends Controller {
    private $_posts;
    private $_user;


    // Instance de Model et recupération de getPosts() / getUser()
    public function showView() {
        $this->showViewHeader();
       
        // Recuperer tous mes posts
        $this->_posts = new ModelHome;
        $getPosts = $this->_posts->getPosts();


        // Recuperer mon user connecté
        $this->_user = new ModelHome;
        $getUser = $this->_user->getUser();

        // Création de tableau de données
        $arrayDataHome = [
            'getPosts' => $getPosts,
            'getUser' => $getUser,
        ];

        $this->render($arrayDataHome, 'home');
    }
}