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


    // ************  POSTS  *************
    // Fonction pour récuperer tous mes posts
    public function getPosts() {

        $this->bddConnect();

        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts ORDER BY post_date_create ASC LIMIT 0, 5"
        );

        $posts = $request->fetchAll();

        return $posts;
    }



    // *************  User  *****************
    // Fonction Récupérer l'utilisateur connecté
    public function getUser() {
        $this->bddConnect();

        if (isset($_POST['username'])) {
            // récupérer le nom d'utilisateur
            $username = stripslashes($_REQUEST['username']);
            // récupérer le password
            $password = stripslashes($_REQUEST['password']);
   
            $query = self::$_database->query(
                "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'"
            );
            $usernames = $query->fetchAll();
            return $usernames;
        } else {
            echo 'ne récupère pas le user connecté !!!!';
        }
       
    }



    // Fonction Register User
    public function registerUser() {
        $this->bddConnect();

        if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
            // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
            $username = stripslashes($_REQUEST['username']);
            // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
            $email = stripslashes($_REQUEST['email']);
            // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
            $password = stripslashes($_REQUEST['password']);

            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "INSERT into `users` (username, email, password) VALUES ('$username', '$email', '".hash('sha256', $password)."')"
            );

           
            echo "****************DEBUG*****************";
            echo '</br>';
            echo 'affichage request';
            echo '</br>';
            var_dump($_REQUEST);
            echo '</br>';

        }
    }
   



    // ************  Comment  ***************
    // Fonction récupérer tous mes comments
    public function getComments() {
        $this->bddConnect();
        $request = self::$_database->query(
            "SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = 1 ORDER BY comment_date ASC LIMIT 0, 5"
        );
        $comments = $request->fetchAll();

       /*
        echo '</br>';
        echo "**********DEBUG de mes commentaire ********";
        echo '</br>';
        var_dump($comments);
        echo '</br>';
        */


        return $comments;
    }
    



   



   
    // Fonction pour récupérer un post selon son id
    public function getPostId() {
       
        $this->bddConnect();
        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts WHERE post_id = 1"
        );
        $posts = $request->fetchAll();
        return $posts;
    }


    // Fonction pour récupérer un post selon son id
    /*
    public function getPostId($post_id) {
       
        $this->bddConnect();
        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts WHERE post_id = ?"
        );
        $post = $request->fetchAll();
        return $post;
    }
    */
}