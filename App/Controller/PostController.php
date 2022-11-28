<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelPost;


class PostController extends Controller {
    private $_postById;
    private $_postComment;
    private $_getComments;
    

    // Instance de Model et recupération de getPosts()
    public function showView() {
        // Appélé ma fonction is_Connected pour transmettre mon user connecté au header
        $this->is_Connected();
       
        // Récuperer un post selon son id
        $this->_postById = new ModelPost;
        $post = $this->_postById->getPostId($_GET['post_id']);


        // Poster un commentaire
        $this->_postComment = new ModelPost;
        $this->_postComment->postComment($_GET['post_id']);


        // Recuperer mes commentaires
        $this->_getComments = new ModelPost;
        $comments = $this->_getComments->getComments($_GET['post_id']);



        $arrayDataPost = [
            'post' => $post,
            'comments' => $comments,
        ];


        $this->render($arrayDataPost, 'post');

    }
}