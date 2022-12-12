<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelEdit;


class EditController extends Controller {
    private $_postById;
    private $_editPost;
    private $_users;
    

    // Instance de Model et recupération de getPosts()
    public function showView() {
        $this->showViewHeader();
        $post_id = $_POST['post_id'];
       
        // Récuperer un post selon son id
        $this->_postById = new ModelEdit;
        $getPost = $this->_postById->getPostId($post_id);

        // Récupération de mes users pour la liste deroulante
        $this->_users = new ModelEdit;
        $getUsers = $this->_users->getUsers();


        $arrayDataEdit = [
            'getPost' => $getPost,
            'getUsers' => $getUsers
        ];

        $this->postEdit();

        $this->render($arrayDataEdit, 'edit');
    }


    
    // Modifier un Post
    public function postEdit() {
        $post_id = $_POST['post_id'];

        echo 'voici mon post id';
        echo '</br>';
        echo '</br>';
        var_dump($_POST['post_id']);
        echo '</br>';
        echo '</br>';


        $this->_editPost = new ModelEdit;
        $this->_editPost->editPost($post_id);
    }
    
}