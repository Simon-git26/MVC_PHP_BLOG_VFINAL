<!DOCTYPE html>
<html>
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
                
                <!--  Partie Login / Petite description et username  -->
                <div class="row section topspace">
                    <div class="col-md-12">

                        <?php if (!is_null($getUser) || isset($getUser)) {
                        ?>
                            <p class="lead text-center">Bonjour <strong style="color:rgba(189, 21, 80, 0.8);font-weight:bold;"><?= $getUser['username'];?> <?= $getUser['firstname'];?></strong>. Ceci est la page d'accueil, si vous souhaitez vous deconnecter, cliquer ici: <a href="App/Views/logout.php" style="color:rgba(189, 21, 80, 0.8);font-weight:bold;">D&eacute;connexion</a></br></p> 
                        <?php
                        }
                        ?>

                        
                    </div>
                </div>

                
                
                <div class="row section featured topspace">
                    <h2 class="section-title"><span>Les derniers posts</span></h2>

                    <div class="row">
                    
                        <!-- Affichage de mes posts -->
                        <?php
                        foreach ($getPosts as $post) {
                        ?>
                            <div class="col-sm-6 col-md-3" style="display: flex;flex-direction: column;align-items: center;margin-bottom: 45px;">
                                <!--  Infos de mon post  -->
                                <h3 class="text-center"><?= $post['post_title']; ?></h3>
                                <h4 class="text-center">Crée par <?= $post['username']; ?> <?= $post['firstname']; ?></h4>
                                <p><?= $post['post_content']; ?></p>
                                <p><?= $post['post_date_create']; ?></p>

                                <!--  Affichage de mon post unitaire -->
                                <form class="box" action="?page=post" method="post" name="post">
                                    <?php
                                    if (isset($_SESSION['auth']) && $_SESSION['auth'] != "") {
                                        ?>
                                        <input type="submit" value="Affichage de mon post" name="submit" class="btn btn-action">
                                        <?php
                                    }
                                    ?>
                                    <input type="hidden" name="post_id" value="<?=urlencode($post['post_id']) ?>">
                                </form>


                                <?php
                                // Partie is_admin, Modifier et Supprimer
                                if ($getUser['is_admin'] === '1') { ?>
                                    <div class="row">
                                        <div style="display:flex;justify-content:center;">
                                            <form class="box" action="?page=edit" method="post" name="postedit">
                                                <input type="submit" value="Modifier" name="submit" class="btn btn-action">
                                                <input type="hidden" name="post_id" value="<?=urlencode($post['post_id']) ?>">
                                            </form>

                                            <form class="box" action="?page=delete" method="post" name="postdelete">
                                                <input type="submit" value="Supprimer" name="submit" class="btn btn-action">
                                                <input type="hidden" name="post_id" value="<?=urlencode($post['post_id']) ?>">
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            
                

                <!--
                    <div class="row section topspace">
                        <div class="panel panel-cta"><div class="panel-body">
                            <div class="col-lg-8">
                                <p>A simple, nice-looking <b>call to action box</b>. Boxing is about respect. getting it for yourself, 
                                and taking it away from the other guy. no, this is mount everest. </p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="http://www.gettemplate.com/downloads/initio.zip " class="btn btn-primary btn-lg">Download template</a>
                            </div>
                        </div></div>
                    </div>
                -->
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
