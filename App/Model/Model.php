<?php 

namespace App\Model;

// Fonction qui nous permet d'éviter de répéter du code
use \PDO;
   
class Model {

    private static $_database;

    // Connexion Base de donnée
    private function bddConnect() {
        self::$_database = new PDO('mysql:host=localhost;dbname=p5_mvc_php;charset=utf8', 'root', 'root');
        self::$_database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    // Fonction pour récuperer tous mes posts
    public function getPosts() {

        $this->bddConnect();

        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts ORDER BY post_date_create ASC LIMIT 0, 5"
        );

        $posts = $request->fetchAll();

        return $posts;
    }
}



















/*echo '</br>';
        echo '</br>';
        echo 'ouai ouai ouai';
        echo '</br>';
        echo '</br>';
        var_dump($posts);
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';


        while (($row = $res->fetchAll(PDO::FETCH_OBJ))) {
            $post = [
            'post_title' => $row['post_title'],
            'post_content' => $row['post_content'],
            'post_date_create' => $row['post_date_create'],
            // Recuperer l'id du post pour affichage d'un post précis selon son id
            'identifier' => $row['post_id'],
            ];

            $posts[] = $post;

            echo '</br>';
            echo '</br>';
            echo '***********Reussi*****************';
            echo '</br>';
            var_dump($posts);
            echo '</br>';
            die();
        }*/