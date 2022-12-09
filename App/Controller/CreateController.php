<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelCreate;


class CreateController extends Controller {
    private $_user;
    private $_createPost;


    // Instance de Model et recupération de getPosts() / getUser()
    public function showView() {
        $this->showViewHeader();
       

        // Recuperer mon user connecté
        $this->_user = new ModelCreate;
        $getUser = $this->_user->getUser();

        // Création de tableau de données
        $arrayDataCreatePost = [
            'getUser' => $getUser,
        ];

        $this->postCreate();

        $this->render($arrayDataCreatePost, 'createPost');
    }


    // Créer un Commentaire
    public function postCreate() {
        $this->_createPost = new ModelCreate;
        $this->_createPost->createPost();
    }




    /*
    class CreateController extends Controller {
        private $_createPost;
    
    
        public function showView() {
            $this->showViewHeader();
           
            $this->_createPost = new ModelCreate;
            $this->_createPost->createPost();
    
            $this->render([], 'createPost');
        }
    }
    */
}