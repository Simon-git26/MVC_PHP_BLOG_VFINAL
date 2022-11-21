<?php

namespace App\Controller;

use App\Controller\Controller as Controller;


class RegisterController extends Controller {
    public function showView() {
        $this->render([], 'register');
    }
}