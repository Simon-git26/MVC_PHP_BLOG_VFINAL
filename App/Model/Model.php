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
                "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create, users.username, users.firstname FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY post_date_create ASC LIMIT 0, 4"
            );
        } else {
            $request = self::$_database->query(
                "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create, users.username, users.firstname FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY post_date_create ASC"
            );
        }
       
        $posts = $request->fetchAll();
        return $posts;
    }



    // Récupérer un post selon son id
    public function getPostId($getPostId) {
       
        $this->connectDatabase();
     
        $request = self::$_database->query(
            "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create, users.username, users.firstname FROM posts INNER JOIN users ON posts.user_id = users.id WHERE post_id = '".$getPostId."'"
        );

        $post = $request->fetchAll();
        return $post[0];
    }


    // Création d'un Post
    public function createPost() {
        $this->connectDatabase();

        if (isset($_REQUEST['title_post'], $_REQUEST['content_post'])){
            $title_post = htmlspecialchars(stripslashes($_REQUEST['title_post']));
            $content_post = htmlspecialchars(stripslashes($_REQUEST['content_post']));
            $user_id = $_SESSION['user_id'];
            ?>

            <?php
            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "INSERT into `posts` (post_title, post_content, user_id) VALUES ('$title_post', '$content_post', $user_id)"
            );

            header("Location: ?page=blog");
        }
    }


    // Modifier un Post
    public function editPost($post_id) {
        $this->connectDatabase();

        if (isset($_REQUEST['title_post_edit'], $_REQUEST['content_post_edit'], $_REQUEST['users'])){
            $title_post_edit = htmlspecialchars(stripslashes($_REQUEST['title_post_edit']));
            $content_post_edit = htmlspecialchars(stripslashes($_REQUEST['content_post_edit']));

            $user_id = stripslashes($_REQUEST['users']);
            ?>

            <?php
            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "UPDATE `posts` SET post_title='".$title_post_edit."', post_content='".$content_post_edit."', user_id=$user_id, post_date_create= CURRENT_TIMESTAMP WHERE post_id=$post_id"
            );

            header("Location: ?page=blog");
        }
    }



    // Supprimer un Post
    public function deletePost($post_id) {
        $this->connectDatabase();

        if (isset($_POST['submit_supp'])){

            $query = self::$_database->query(
                "DELETE FROM `posts` WHERE post_id=$post_id"
            );

            header("Location: ?page=home");
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
            $_SESSION['user_id'] = $user[0][0];

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


    // Récuperer tous mes Users pour liste déroulante dans editPost
    public function getUsers() {
        $this->connectDatabase();

        $request = self::$_database->query(
            "SELECT id, username, firstname FROM `users`"
        );

        $users = $request->fetchAll();
        return $users;
    }



    // Enregistrer un utilisateur
    public function registerUser() {
        $this->connectDatabase();

        if (isset($_REQUEST['username'], $_REQUEST['firstname'], $_REQUEST['email'], $_REQUEST['slogan'], $_REQUEST['password'])){
            // récupérer le nom d'utilisateur et supprimer les antislashes
            $username = htmlspecialchars(stripslashes($_REQUEST['username']));
            $firstname = htmlspecialchars(stripslashes($_REQUEST['firstname']));
            // récupérer l'email et supprimer les antislashes
            $email = htmlspecialchars(stripslashes($_REQUEST['email']));
            $slogan = htmlspecialchars(stripslashes($_REQUEST['slogan']));
            // récupérer le mot de passe et supprimer les antislashes
            $password = stripslashes($_REQUEST['password']);

            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "INSERT into `users` (username, firstname, email, slogan, password) VALUES ('$username', '$firstname', '$email', '$slogan', '".hash('sha256', $password)."')"
            );
        }
    }
   




    //
    // ***********************************************  Comment  ****************************************
    //
    // Récupérer tous mes comments
    public function getComments($getComments) {
        $this->connectDatabase();
       
        $request = self::$_database->query(
            "SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = $getComments AND is_actif = 1 ORDER BY comment_date ASC LIMIT 0, 5"
        );
        $comments = $request->fetchAll();
        return $comments;
    }


    // Récupérer tous mes comments en attente de validation
    public function getCommentsWaitForValidation() {
        $this->connectDatabase();
       
        $request = self::$_database->query(
            "SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE is_actif = 0 ORDER BY comment_date ASC LIMIT 0, 5"
        );
        $comments = $request->fetchAll();
        return $comments;
    }


    // Function pour Valider un commentaire
    public function validComment($comment_id) {
        $this->connectDatabase();

        if (isset($_POST['user_comment'], $_POST['content_comment'])){
            $submit_user = stripslashes($_POST['user_comment']);
            $submit_content = stripslashes($_POST['content_comment']);

            $request = self::$_database->query(
                "UPDATE `comments` SET comment_user='".$submit_user."', comment_content='".$submit_content."', is_actif = 1, post_id = 2 WHERE comment_id = $comment_id"
           
            );

            header("Location: ?page=admin");
        }
    }



    // Function pour Rejeter un commentaire
    public function dismissComment($comment_id) {
        $this->connectDatabase();

        if (isset($_POST['submit_dismiss'])){

            $request = self::$_database->query(
                "DELETE FROM `comments` WHERE comment_id = $comment_id"
           
            );

            header("Location: ?page=admin");
        }
    }


   
    //Poster un commentaire
    public function postComment($postComment) {
        $this->connectDatabase();

        if (isset($_REQUEST['comment_user'], $_REQUEST['comment_content'])){
            // récupérer le nom du user qui commente et supprimer les antislashes
            $comment_user = htmlspecialchars(stripslashes($_REQUEST['comment_user']));
            // récupérer le contenu du commentaire et supprimer les antislashes
            $comment_content = htmlspecialchars(stripslashes($_REQUEST['comment_content']));
            ?>

            <?php
            //requéte SQL + mot de passe crypté
            $query = self::$_database->query(
                "INSERT into `comments` (post_id, comment_user, comment_content, is_actif) VALUES ($postComment, '$comment_user', '$comment_content', 0)"
            );


            header("Location: ?page=home");
        }
    }
}