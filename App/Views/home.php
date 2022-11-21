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
        <?php
        //Inclure mon header 
        require_once('header.php');
        ?>


        <main id="main">
            <div class="container">
                
                <!--  Partie Login / Petite description et username  -->
                <div class="row section topspace">
                    <div class="col-md-12">
                        <?php
                        foreach ($usernames as $username) {
                        ?>
                            <p class="lead text-center text-muted">Bonjour <strong><?= $username['username'];?></strong>. Ceci est la page d'accueil, si vous souhaitez vous deconnecter, cliquer ici: <a href="App/Views/logout.php">Déconnexion</a></br> 
                            Si vous souhaitez acceder a votre tableau de borde cliquer ici: <a href="sidebar-right.html">Tableau de bord</a>. </p>
                        
                        <?php
                        }
                        ?>
                    </div>
                </div>

                
                
                <div class="row section featured topspace">
                    <h2 class="section-title"><span>Liste des posts</span></h2>

                    <div class="row">
                    
                        <!-- Affichage de mes posts -->
                        <?php
                        foreach ($posts as $post) {
                        ?>
                            <div class="col-sm-6 col-md-3" style="display: flex;flex-direction: column;align-items: center;margin-bottom: 45px;">
                                <!--  Infos de mon post  -->
                                <h3 class="text-center"><?= $post['post_title']; ?></h3>
                                <p><?= $post['post_content']; ?></p>
                                <p><?= $post['post_date_create']; ?></p>

                                <!--  Affichage de mon post unitaire -->
                                <form class="box" action="?page=post&post_id=<?=urlencode($post['post_id']) ?>" method="post" name="post">
                                    <input type="submit" value="Affichage de mon post" name="submit" class="btn btn-action">
                                </form>


                                <?php
                                // Partie is_admin, activer les boutons si l'utilisateur connecté est un admin
                                if ($username['is_admin'] === '1') { ?>
                                    <p class="text-center"><a href="" class="btn btn-action">Modifier</a></p>
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
