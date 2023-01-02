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
    <body>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!-- ********************** COMMENTAIRES *************** -->
                        <div id="comments">	
                            <h2 class="section-title"><span>Commentaires</span></h2>
                            <p>Commentaires en attente de validation</p>

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

                                    <div class="row">
                                        <div style="display:flex;">
                                            <form class="box" action="?page=admin" method="post" name="validcomment">
                                                <!-- Valider Commentaire -->
                                                <input type="submit" name="valid_comment" class="btn btn-primary pt-2" value="Valider ?" >
                                                <input type="hidden" name="id_comment" value="<?=urlencode($comment['comment_id']) ?>">
                                                <input type="hidden" name="user_comment" value="<?= $comment['comment_user']; ?>">
                                                <input type="hidden" name="content_comment" value="<?= $comment['comment_content']; ?>">
                                            </form>
                                            
                                            <!-- Rejeter Commentaire -->
                                            <form class="box" action="" method="post" name="dismisscomment" style="margin-left:1rem;">
                                                <input type="submit" name="submit_dismiss" class="btn btn-primary pt-2" value="Rejeter ?" >
                                                <input type="hidden" name="dismiss_id_comment" value="<?=urlencode($comment['comment_id']) ?>">
                                            </form>
                                        </div>
                                    </div>
                                    
                                <?php
                                }
                                ?>
                            </ol>
                            
                            <div class="clearfix"></div>
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
