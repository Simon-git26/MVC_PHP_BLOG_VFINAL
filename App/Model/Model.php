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


    //
    // *************************************  POSTS  ************************************
    // 
    // Récuperer tous mes posts
    public function getPosts() {

        $this->bddConnect();

        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts ORDER BY post_date_create ASC LIMIT 0, 5"
        );

        $posts = $request->fetchAll();
        return $posts;
    }


    // Récupérer un post selon son id
    public function getPostId($get_by_id_post) {
       
        $this->bddConnect();

        echo '******************** Requete getPostId pour id du post ******************';
        echo '</br>';
        var_dump("SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts WHERE post_id = '".$get_by_id_post."'");
        echo '</br>';


        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts WHERE post_id = '".$get_by_id_post."'"
        );
        $posts = $request->fetchAll();
        return $posts;
    }






    //
    // ****************************************  User  ****************************************
    //
    // Récupérer l'utilisateur connecté
    public function getUser() {
        $this->bddConnect();

        if (isset($_POST['username'])) {
            // récupérer le nom d'utilisateur
            $username = stripslashes($_REQUEST['username']);
            // récupérer le password
            $password = stripslashes($_REQUEST['password']);
   
            $request = self::$_database->query(
                "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'"
            );
            $usernames = $request->fetchAll();
            return $usernames;
        } else {
            echo 'ne récupère pas le user connecté !!!!';
        }
       
    }



    // Enregistrer un utilisateur
    public function registerUser() {
        $this->bddConnect();

        if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
            // récupérer le nom d'utilisateur et supprimer les antislashes
            $username = stripslashes($_REQUEST['username']);
            // récupérer l'email et supprimer les antislashes
            $email = stripslashes($_REQUEST['email']);
            // récupérer le mot de passe et supprimer les antislashes
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
   






    //
    // ***********************************************  Comment  ****************************************
    //
    // Récupérer tous mes comments
    public function getComments($get_comments) {
        $this->bddConnect();

        echo '******************** Requete Comments par id du post ******************';
        echo '</br>';
        var_dump("SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = $get_comments ORDER BY comment_date ASC LIMIT 0, 5");

        $request = self::$_database->query(
            "SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = $get_comments ORDER BY comment_date ASC LIMIT 0, 5"
        );
        $comments = $request->fetchAll();

       
        echo '</br>';
        echo "**********DEBUG de mes commentaire ********";
        echo '</br>';
        var_dump($comments);
        echo '</br>';
        
        return $comments;
    }


    
    //Poster un commentaire
    public function postComment($get_post_id) {
        $this->bddConnect();

        if (isset($_REQUEST['comment_user'], $_REQUEST['comment_content'])){
            // récupérer le nom du user qui commente et supprimer les antislashes
            $comment_user = stripslashes($_REQUEST['comment_user']);
            // récupérer le contenu du commentaire et supprimer les antislashes
            $comment_content = stripslashes($_REQUEST['comment_content']);

            echo '</br>';
            echo 'var_dump du POST COMMENT';
            echo '</br>';
            var_dump("INSERT into `comments` (post_id, comment_user, comment_content) VALUES ($get_post_id, '$comment_user', '$comment_content')");
            echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '</br>';
            
            
            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "INSERT into `comments` (post_id, comment_user, comment_content) VALUES ($get_post_id, '$comment_user', '$comment_content')"
            );

           
            echo "****************DEBUG*****************";
            echo '</br>';
            echo 'affichage request poster commentaire Model';
            echo '</br>';
            var_dump($_REQUEST);
            echo '</br>';
        }
    }
}