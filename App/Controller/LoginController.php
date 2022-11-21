<?php

namespace App\Controller;

use App\Controller\Controller as Controller;
use App\Model\Model as ModelLogin;


class LoginController extends Controller {
    private $_registerUser;

    public function showView() {
        $this->_registerUser = new ModelLogin;
        $this->_registerUser->registerUser();

        $this->render([], 'login');
    }
}