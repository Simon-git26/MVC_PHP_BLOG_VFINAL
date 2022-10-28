<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as Model;

class HomeController extends Controller {
    private $_test;

    public function getBddData() {
        $this->_test = new Model;
        $posts = $this->_test->getGet();

        $this->renderer(array('posts' => $posts), 'home');
    }
}