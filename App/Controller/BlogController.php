<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelBlog;


class BlogController extends Controller {
    private $_posts;


    // Instance de Model et recupération de getPosts() / getUser()
    public function showView() {
        $this->showViewHeader();
       
        // Recuperer tous mes posts
        $this->_posts = new ModelBlog;
        $getPosts = $this->_posts->getPosts();

        // Création de tableau de données
        $arrayDataBlog = [
            'getPosts' => $getPosts
        ];

        $this->render($arrayDataBlog, 'blog');
    }
}