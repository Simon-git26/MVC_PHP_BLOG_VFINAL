<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelAdmin;


class AdminController extends Controller {
    private $_deletePost;
    private $_comments;

    // Instance de Model et recupération de getPosts()
    public function showView() {
        $this->showViewHeader();
       
        // Recuperer mes commentaires
        $this->_comments = new ModelAdmin;
        $getComments = $this->_comments->getCommentsWaitForValidation();

        $arrayDataAdmin = [
            'getComments' => $getComments,
        ];

        $this->validComment();
        $this->dismissComment();

        $this->render($arrayDataAdmin, 'admin');
    }



    // Valider un Commentaire
    public function validComment() {
        $comment_id = $_POST['id_comment'];

        $this->_deletePost = new ModelAdmin;
        $this->_deletePost->validComment($comment_id);
    }


    // Rejeter un Commentaire
    public function dismissComment() {
        $comment_id = $_POST['dismiss_id_comment'];

        $this->_deletePost = new ModelAdmin;
        $this->_deletePost->dismissComment($comment_id);
    }
}