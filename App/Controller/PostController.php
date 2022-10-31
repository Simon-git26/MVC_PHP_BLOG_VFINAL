<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as Model;


class PostController extends Controller {
    private $_model;

    // Instance de Model et recupération de getPosts()
    // Envoi de mon tableau $posts a ma view home
    public function getBddData($post_id) {
        
        $this->_model = new Model;
        $post = $this->_model->getPostId($post_id);

        $this->render(array('post' => $post), 'post');
    }
}