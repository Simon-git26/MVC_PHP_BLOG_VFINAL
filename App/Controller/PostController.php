<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelPost;


class PostController extends Controller {
    private $_postById;
    private $_createComment;
    private $_comments;
    

    // Instance de Model et recupération de getPosts()
    public function showView() {
        // Appélé ma fonction is_Connected pour transmettre mon user connecté au header
        $this->showViewHeader();
        $post_id = $_POST['post_id'];
       
        // Récuperer un post selon son id
        $this->_postById = new ModelPost;
        $getPost = $this->_postById->getPostId($post_id);


        // Recuperer mes commentaires
        $this->_comments = new ModelPost;
        $getComments = $this->_comments->getComments($post_id);

        $arrayDataPost = [
            'getPost' => $getPost,
            'getComments' => $getComments,
        ];

        $this->createComment();

        $this->render($arrayDataPost, 'post');
    }


    // Créer un Commentaire
    public function createComment() {
        $post_id = $_POST['post_id'];
       
        // Poster un commentaire
        $this->_createComment = new ModelPost;
        $this->_createComment->postComment($post_id);
    }
}