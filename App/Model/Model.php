<?php 

namespace App\Model;

use \PDO;
   
class Model {

    private static $_database;

    // Connexion Base de donnée
    private function connectDatabase() {
        self::$_database = new PDO('mysql:host=localhost;dbname=p5_mvc_php;charset=utf8', 'root', 'root');
        self::$_database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    //
    // *************************************  POSTS  ************************************
    // 
    // Récuperer tous mes posts
    public function getPosts() {

        $this->connectDatabase();

        // Si home requetes avec limit sinon (blog) tous les posts
        if ($_GET['page'] === 'home') {
            $request = self::$_database->query(
                "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create, users.username FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY post_date_create ASC LIMIT 0, 4"
            );
        } else {
            $request = self::$_database->query(
                "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create, users.username FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY post_date_create ASC"
            );

            ?>
                <pre>
                    <?php
                        echo "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create, users.username FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY post_date_create ASC";
                        echo '</br>';
                        echo '</br>';
                        echo '</br>';
                        var_dump($request);
                        echo '</br>';
                        echo '</br>';
                    ?>
                </pre>
            <?php
        }
        
        $posts = $request->fetchAll();

        ?>
            <pre>
                <?php
                    echo '</br>';
                    var_dump($posts);
                    echo '</br>';
                    echo '</br>';
                ?>
            </pre>
        <?php

        return $posts;
    }



    // Récupérer un post selon son id
    public function getPostId($getPostId) {
       
        $this->connectDatabase();
        /*
        ?>
        
        <pre>
            <?php
            echo '******************** Requete getPostId pour id du post ******************';
            echo '</br>';
            var_dump("SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts WHERE post_id = '".$getPostId."'");
            echo '</br>';
            ?>
        </pre>

        <?php
        */
        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create, users.username FROM posts INNER JOIN users ON posts.user_id = users.id WHERE post_id = '".$getPostId."'"
        );

        $post = $request->fetchAll();
        return $post[0];
    }


    // Création d'un Post
    public function createPost() {
        $this->connectDatabase();

        if (isset($_REQUEST['title_post'], $_REQUEST['content_post'])){
            $title_post = stripslashes($_REQUEST['title_post']);
            $content_post = stripslashes($_REQUEST['content_post']);
            ?>

            <pre>
                <?php
                    echo '</br>';
                    echo 'var_dump du create post';
                    echo '</br>';
                    var_dump("INSERT into `posts` (post_title, post_content) VALUES ('$title_post', '$content_post')");
                    echo '</br>';
                    echo '</br>';
                    echo '</br>';
                ?>
            </pre>

            <?php
            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "INSERT into `posts` (post_title, post_content) VALUES ('$title_post', '$content_post')"
            );
        }
    }

    //
    // ****************************************  User  ****************************************
    //
    // Récupérer l'utilisateur connecté
    public function getUser() {
        $this->connectDatabase();

        if (isset($_POST['username'])) {
            // récupérer le nom d'utilisateur
            $username = stripslashes($_REQUEST['username']);
            // récupérer le password
            $password = stripslashes($_REQUEST['password']);
   
            $request = self::$_database->query(
                "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'"
            );

            $user = $request->fetchAll();

            $_SESSION['auth'] = $_POST['username'];

            if (is_null($user[0])) {
                header("Location: ?page=login");
            }

            return $user[0];

        } else {
            $username = $_SESSION['auth'];

            $request = self::$_database->query(
                "SELECT * FROM `users` WHERE username='$username'"
            );

            $user = $request->fetchAll();

            return $user[0];
        }
    }



    // Enregistrer un utilisateur
    public function registerUser() {
        $this->connectDatabase();

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

           
            ?>
        
            <pre>
                <?php
                echo "****************DEBUG*****************";
                echo '</br>';
                echo 'affichage request';
                echo '</br>';
                var_dump($_REQUEST);
                echo '</br>';
                ?>
            </pre>

            <?php
        }
    }
   






    //
    // ***********************************************  Comment  ****************************************
    //
    // Récupérer tous mes comments
    public function getComments($getComments) {
        $this->connectDatabase();
        /*
        ?>
        
        <pre>
            <?php
            echo '******************** Requete Comments par id du post ******************';
            echo '</br>';
            var_dump("SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = $getComments ORDER BY comment_date ASC LIMIT 0, 5");
            ?>
        </pre>

        <?php
        */
        $request = self::$_database->query(
            "SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = $getComments ORDER BY comment_date ASC LIMIT 0, 5"
        );
        $comments = $request->fetchAll();
        return $comments;
    }


    
    //Poster un commentaire
    public function postComment($postComment) {
        $this->connectDatabase();

        if (isset($_REQUEST['comment_user'], $_REQUEST['comment_content'])){
            // récupérer le nom du user qui commente et supprimer les antislashes
            $comment_user = stripslashes($_REQUEST['comment_user']);
            // récupérer le contenu du commentaire et supprimer les antislashes
            $comment_content = stripslashes($_REQUEST['comment_content']);
            ?>

            <pre>
                <?php
                    echo '</br>';
                    echo 'var_dump du POST COMMENT';
                    echo '</br>';
                    var_dump("INSERT into `comments` (post_id, comment_user, comment_content) VALUES ($postComment, '$comment_user', '$comment_content')");
                    echo '</br>';
                    echo '</br>';
                    echo '</br>';
                    echo '</br>';
                ?>
            </pre>

            <?php
            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "INSERT into `comments` (post_id, comment_user, comment_content) VALUES ($postComment, '$comment_user', '$comment_content')"
            );


            header("Location: ?page=home");
        }
    }
}