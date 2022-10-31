<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelHome;


class HomeController extends Controller {
    private $_model;

    // Instance de Model et recupération de getPosts()
    // Envoi de mon tableau $posts a ma view home
    public function getBddData() {
        
        $this->_model = new ModelHome;
        $posts = $this->_model->getPosts();

        $this->render(array('posts' => $posts), 'home');
    }
}