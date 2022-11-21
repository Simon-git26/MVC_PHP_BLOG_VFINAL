<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelUser;


class LoginController extends Controller {
    private $_login;

    public function getBddData() {
        $this->_login = new ModelUser;
        $this->_login->registerUser();

        $this->render([], 'login');
    }
}