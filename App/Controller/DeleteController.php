<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelDelete;


class DeleteController extends Controller {
    private $_postById;
    private $_deletePost;

    // Instance de Model et recupération de getPosts()
    public function showView() {
        $this->showViewHeader();

        $post_id = $_POST['post_id'];
       
        // Récuperer un post selon son id
        $this->_postById = new ModelDelete;
        $getPost = $this->_postById->getPostId($post_id);


        $arrayDataDelete = [
            'getPost' => $getPost
        ];

        $this->postDelete();

        $this->render($arrayDataDelete, 'delete');
    }


    // Modifier un Post
    public function postDelete() {
        $post_id = $_POST['post_id'];

        $this->_deletePost = new ModelDelete;
        $this->_deletePost->deletePost($post_id);
    }
}