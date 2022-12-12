<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelBlog;


class BlogController extends Controller {
    private $_posts;
    private $_user;


    // Instance de Model et recupération de getPosts() / getUser()
    public function showView() {
        $this->showViewHeader();
       
        // Recuperer tous mes posts
        $this->_posts = new ModelBlog;
        $getPosts = $this->_posts->getPosts();

        // Recuperer mon user connecté
        $this->_user = new ModelBlog;
        $getUser = $this->_user->getUser();

        // Création de tableau de données
        $arrayDataBlog = [
            'getPosts' => $getPosts,
            'getUser' => $getUser
        ];

        $this->render($arrayDataBlog, 'blog');
    }
}