<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelPost;


class PostController extends Controller {
    private $_post;


    // Instance de Model et recupération de getPosts()
    // Envoi de mon tableau $posts a ma view home
    public function getBddData() {
       
        $this->_post = new ModelPost;
        $posts = $this->_post->getPostId();

        echo 'DEBUG';
        echo '</br>';
        var_dump($posts);


        // Recuperer mes commentaires
        $this->_comment = new ModelPost;
        $comments = $this->_comment->getComments();
        

        $arrayVariablePost = [
            'posts' => $posts,
            'comments' => $comments,
        ];


        $this->render($arrayVariablePost, 'post');

    }
}