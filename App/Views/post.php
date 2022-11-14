<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog PHP Mvc</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       
        <link rel="stylesheet" href="../public/style.css" />
    </head>

    <body>


        <?php
        foreach ($posts as $post) {
        ?>

            <div class="card m-5" style="width: 19rem;box-shadow: 0px 0px 8px 0px grey;">
                <div class="card-body" style="text-align:center;">
                    <h5 class="card-title"><?= $post['post_title']; ?></h5>
                    <p class="card-text"><?= $post['post_content']; ?></p>
                    <p class="card-text"><?= $post['post_date_create']; ?></p>




                    <!--Test pour utiliser mes commentaire-->
                    <!-- A terme, il faudra les afficher sur une page post unique au clic sur lien affichage de mon posts car id post sera donnée a ce clique et donc 
                    recuperer par la requete de funciton getComments()  ? -->
                    <?php
                    foreach ($comments as $comment) {
                    ?>
                        <h5 class="card-title"><?= $comment['comment_user']; ?></h5>
                        <h5 class="card-title"><?= $comment['comment_content']; ?></h5>
                        <h5 class="card-title"><?= $comment['comment_date']; ?></h5>
                    <?php
                    }
                    ?>

                </div>
            </div>

        <?php
        }
        ?>
        
       

    </body>
</html>