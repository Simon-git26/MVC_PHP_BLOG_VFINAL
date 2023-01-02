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

                                    <!--  Contenu du post  -->
                                    <p>
                                        <?= $getPost['post_content']; ?>
                                    </p>
                                </div> 
                            </article>

                            <form class="box" action="" method="post" name="postdelete">
                                <input type="submit" value="Supprimer ce Post ?" name="submit_supp" class="btn btn-primary">
                                <input type="hidden" name="post_id" value="<?=urlencode($getPost['post_id']) ?>">
                            </form>

                        <?php
                        }
                        ?>
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
