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
        <?php
            //Inclure mon header 
            require_once('header.php');
        ?>

        <main id="main">
            <div class="container">

                <div class="row topspace">
                    <div class="col-sm-8 col-sm-offset-2">
                                                                    
                        <article class="post">
                            <header class="entry-header">
                                <div class="entry-meta"> 
                                    <span class="posted-on"><time class="entry-date published" date="2013-09-27">September 27, 2013</time></span>			
                                </div>
                                <h1 class="entry-title">Bienvenu sur le Blog !</h1>
                            </header>
                            <div class="entry-content">
                                <p>rehenderit placeat quam debitis quas magni eveniet.inctio, quia, providem inventore itaque atque sint nihil eveniet consequuntur eius! Laborum, at sit animi quae quidem ex tempora facilis.</p>
                            </div>
                        </article>


                        <div class="row">

                            <!-- Affichage de mes posts -->
                            <?php
                            foreach ($getPosts as $post) {
                            ?>

                            <article class="col-sm-6 col-md-6 post" style="text-align: center;">
                                <header class="entry-header">
                                    <div class="entry-meta"> 
                                        <span class="posted-on"><time class="entry-date published" date="2013-09-27"><?= $post['post_date_create']; ?></time></span>			
                                    </div>
                                    <h3 class="text-center"><?= $post['post_title']; ?></h3>
                                </header>
                                <div class="entry-content">
                                    <p><?= $post['post_content']; ?></p>

                                    <!--  Affichage de mon post unitaire -->
                                    <form class="box" action="?page=post" method="post" name="post">
                                        <input type="submit" value="Affichage de mon post" name="submit" class="btn btn-action">
                                        <input type="hidden" name="post_id" value="<?=urlencode($post['post_id']) ?>">
                                    </form>
                                </div>
                            </article>

                            <?php
                            }
                            ?>
                        </div>
                    </div> 
                </div>

                <center class="">
                    <ul class="pagination">
                        <li class="disabled"><a href="">&laquo;</a></li>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">6</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </center>
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