<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelUser;


class LoginController extends Controller {
    private $_register;


    // Instance de Model et recupération de getPosts()
    // Envoi de mon tableau $posts a ma view home
    public function getBddData() {
       

        $this->_register = new ModelUser;
        $this->_register->registerUser();

        $arrayVariableRegister = [];

        $this->render($arrayVariableRegister, 'login');

    }
}