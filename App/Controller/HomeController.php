<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as Model;

class HomeController extends Controller {
    private $_model;

    public function getBddData() {
        
        $this->_model = new Model;
        $posts = $this->_model->getPosts();

        $this->renderer(array('posts' => $posts), 'home');
    }
}