<?php
/*
session_start();
*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport"    content="width=device-width, initial-scale=1.0">
        
        <title>MVC-PHP</title>
        <link rel="shortcut icon" href="App/public/assets/images/gt_favicon.png">
        
        <!-- Bootstrap -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
        <!-- Icons -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
        <!-- Custom styles -->
        <link rel="stylesheet" href="App/public/assets/css/styles.css">
    </head>


    <body class="home">
        
        <main id="main">
            <div class="container">
                <div class="row topspace">
                    <div class="col-sm-8 col-sm-offset-2">
                         
                        <!-- ***** POST ***** -->

                        <?php if (!is_null($getPost) || isset($getPost)) {
                        ?>
                            <article class="post">
                                <header class="entry-header">
                                    <!--  Titre du post  -->
                                    <h1 class="entry-title"><?= $getPost['post_title']; ?></h1>
                                </header> 
                                <div class="entry-content"> 
            
                                    <!--  Date du post et utilisateur -->
                                    <blockquote>
                                        <p>Crée le : <?= $getPost['post_date_create']; ?> Par : <?= $getPost['username']; ?> <?= $getPost['firstname']; ?></p>
                                    </blockquote>

                                    <!--  Titre du post  -->
                                    <!--<h4><?= $getPost['post_title']; ?></h4>-->

                                    <!--  Contenu du post  -->
                                    <p>
                                        <?= $getPost['post_content']; ?>
                                    </p>
                                </div> 
                            </article>
                        <?php
                        }
                        ?>
                    </div> 
                </div> 


                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!-- ********************** COMMENTAIRES *************** -->
                        <div id="comments">	
                            <h2 class="section-title">Commentaires</h2>

                            <ol class="comments-list">
                                <?php
                                foreach ($getComments as $comment) {
                                ?>
                                    <li class="comment">
                                        <div>
                                            <img src="./App/public/assets/images/mac.jpg" alt="Avatar" class="avatar">
                                            
                                            <div class="comment-meta">
                                                <!--  comment user et comment date  -->
                                                <span class="author"><a href="#"><?= $comment['comment_user']; ?></a></span>
                                                <span class="date"><a href="#"><?= $comment['comment_date']; ?></a></span>
                                            </div>

                                            <div class="comment-body">
                                                <!--  contenu comment  -->
                                                <?= $comment['comment_content']; ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ol>
                            
                            <div class="clearfix"></div>

                            <!-- ************************ Formulaire pour poster un commentaire ******************** -->
                            <div id="respond">
                                <h3 id="reply-title">Poster un commentaire</h3>


                                <form action="?page=post" method="post" id="comment-form" name="post_comment">

                                    <div class="form-group">
                                        <label for="inputName">Nom</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Entrer votre nom" name="comment_user">
                                    </div>
                                    <!--
                                        <div class="form-group">
                                        <label for="inputEmail">Adresse email <i class="text-danger">*</i></label>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Entrer votre email" name="email">
                                    </div>
                                    -->
                                    <div class="form-group">
                                        <label for="inputComment">Commentaire</label>
                                        <textarea class="form-control" rows="6" name="comment_content"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <!--<button type="submit" class="btn btn-action">Envoyer</button>-->
                                            <input type="submit" value="Envoyer" name="submit" class="btn btn-action">
                                            <input type="hidden" name="post_id" value="<?=urlencode($_POST['post_id']) ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>

        </main>
        <?php
        //Inclure mon footer
        require_once('footer.php');
        ?>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="App/public/assets/js/template.js"></script>
    </body>
</html>
