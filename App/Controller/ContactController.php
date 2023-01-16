<?php

namespace App\Controller;

use App\Controller\Controller as Controller;


class ContactController extends Controller {
    public function showView() {
        // Affichage du header
        $this->showViewHeader();

        // Envoi du mail
        $this->sendMail();

        $this->render([], 'contact');
    }


    public function sendMail() {
        if (isset($_POST['title_post']) && isset($_POST['email']) && isset($_POST['content_post'])) {

            $subject = "De la part de".htmlspecialchars(stripslashes($_POST['title_post']));
            $message = htmlspecialchars(stripslashes($_POST['content_post']));
            $headers = 'From: '.$_POST['email'].'' . "\r\n" .
            'Reply-To: '.$_POST['email'] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            
            $success = mail("zetlapower26@gmail.com", $subject, $message, $headers);

            if ($success) {
                header("Location: ?page=home");
            } else {
                header("Location: ?page=contact");
            }
        }
    }
}