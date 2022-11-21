<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelPost;


class PostController extends Controller {
    private $_postById;
    private $_postComment;
    private $_getComments;
    

    // Instance de Model et recupération de getPosts()
    // Envoi de mon tableau $posts a ma view home
    public function getBddData() {
       
        $this->_postById = new ModelPost;
        $posts = $this->_postById->getPostId($_GET['post_id']);

       

        // Poster un commentaire
        $this->_postComment = new ModelPost;
        $this->_postComment->postComment($_GET['post_id']);


        // Recuperer mes commentaires
        $this->_getComments = new ModelPost;
        $comments = $this->_getComments->getComments($_GET['post_id']);



        $arrayVariablePost = [
            'posts' => $posts,
            'comments' => $comments,
        ];


        $this->render($arrayVariablePost, 'post');

    }
}