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
