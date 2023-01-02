<?php

namespace App\Controller;

use App\Controller\Controller as Controller;


class ContactController extends Controller {
    public function showView() {
        $this->showViewHeader();
        
        $this->render([], 'contact');
    }
}