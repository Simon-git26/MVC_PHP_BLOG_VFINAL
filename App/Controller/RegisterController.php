<?php

namespace App\Controller;

use App\Controller\Controller as Controller;


class RegisterController extends Controller {
    public function getBddData() {
        $this->render([], 'register');
    }
}