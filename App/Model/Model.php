<?php 

namespace App\Model;

use \PDO;
   
class Model {

    private static $_database;

    // Connexion Base de donnée
    private function bddConnect() {
        self::$_database = new PDO('mysql:host=localhost;dbname=p5_mvc_php;charset=utf8', 'root', 'root');
        self::$_database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    // POSTS
    // Fonction pour récuperer tous mes posts
    public function getPosts() {

        $this->bddConnect();

        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts ORDER BY post_date_create ASC LIMIT 0, 5"
        );

        $posts = $request->fetchAll();

        return $posts;
    }




    public function getUse() {
        $this->bddConnect();

        if (isset($_POST['username'])) {
            // récupérer le nom d'utilisateur
            $username = stripslashes($_REQUEST['username']);
            // récupérer le password
            $password = stripslashes($_REQUEST['password']);
            
            /*
            echo '*********DEBUG username*******';
            echo '</br>';
            var_dump($username);
            echo '</br>';
            echo '</br>';
            echo '</br>';
            */

            
            $query = self::$_database->query(
                "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'"
            );


            /*
            echo '** Ma Requete **';
            echo '</br>';
            var_dump("SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'");
            echo '</br>';
            echo '</br>';
            */
            
            $usernames = $query->fetchAll();

            /*
            echo '</br>';
            echo '</br>';
            echo '*********DEBUG usernames*******';
            echo '</br>';
            var_dump($usernames);
            echo '</br>';
            echo '</br>';
            echo '*********DEBUG $_REQUEST*******';
            echo '</br>';
            var_dump($_REQUEST);
            echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '*********DEBUG $_SESSION*******';
            echo '</br>';
            var_dump($_SESSION);
            echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '*********DEBUG $_POST*******';
            echo '</br>';
            var_dump($_POST);
            echo '</br>';
            echo '</br>';
            echo '</br>';
            */


            return $usernames;
            
        } else {
            echo 'ne récupère pas le user connecté !!!!';
        }
        
    }



    /*
    // USER
    // Fonction pour récuperer le user qui se connecte
    public function getUser($username) {

        $this->bddConnect();

        $request = self::$_database->query(
            "SELECT * FROM users WHERE user_firstname = '".$username."'"
        );

        $username = $request->fetchAll();

        echo 'username';
        var_dump($username);
        die();

        return $username;


       
    }
    */



    
    // Fonction pour récupérer un post selon son id
    
    /*public function getPostId($post_id) {
        
        $this->bddConnect();

        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts WHERE post_id = ?"
        );

        $post = $request->fetchAll();

        var_dump($post);
        die();

        return $post;
    }*/
    



    // Fonction pour récupérer tous mes comments
    /*
    public function getComments() {
        $this->bddConnect();

        $request = self::$_database->query(
            "SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date ASC LIMIT 0, 5"
        );

        $comments = $request->fetchAll();

        return $comments;
    }
    */
}
