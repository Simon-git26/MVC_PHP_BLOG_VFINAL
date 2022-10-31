<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelUser;


class LoginController extends Controller {

    private $_model;
    

    // Instance de Model et recupération de getPosts()
    // Envoi de mon tableau $posts a ma view home
    public function getBddData() {
        
        $this->_model = new ModelUser;
        $user = $this->_model->getUser($_POST['username']);


        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo 'test';
        var_dump($user);
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';

       die();

        

        $this->render(array('user' => $user), 'user');
    }
}