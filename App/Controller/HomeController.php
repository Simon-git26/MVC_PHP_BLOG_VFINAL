<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelHome;


class HomeController extends Controller {
    private $_model;
    private $_test;
    private $_comment;
    // private $_register;


    // Instance de Model et recupération de getPosts()
    // Envoi de mon tableau $posts a ma view home
    public function getBddData() {
       
        // Recuperer mes posts
        $this->_model = new ModelHome;
        $posts = $this->_model->getPosts();

        // Recuperer mon user conencté
        $this->_test = new ModelHome;
        $usernames = $this->_test->getUser();

        

        /*
        echo '**** Je recupere donc un tableau[] $usernames*****';
        echo '</br>';
        var_dump($usernames);
        echo '</br>';
        echo '</br>';
        */
     

        $arrayVariable = [
            'posts' => $posts,
            'usernames' => $usernames,
        ];

        $this->render($arrayVariable, 'home');
    }
}