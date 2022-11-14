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
        <!--<h1>Le Blog !</h1>-->
       

        <?php
        // Home.php
        ?>

        <!--Partie pour le login pour l'instant -->
        <div class="card" style="width: 25rem; margin:50px;">
            <div class="card-body">
                <div class="sucess">
                   
                    <?php
                    foreach ($usernames as $username) {
                    ?>
                        <h5 class="card-title">Bienvenue <?= $username['username']; ?></h5>
                    <?php
                    }
                    ?>
                    <p>C'est votre tableau de bord.</p>
                    <a href="App/Views/logout.php">Déconnexion</a>
                </div>
            </div>
        </div>

       
       
        <?php
        foreach ($posts as $post) {
        ?>
            <div class="card m-5" style="width: 19rem;box-shadow: 0px 0px 8px 0px grey;">
                <div class="card-body" style="text-align:center;">
                    <h5 class="card-title"><?= $post['post_title']; ?></h5>
                    <p class="card-text"><?= $post['post_content']; ?></p>
                    <p class="card-text"><?= $post['post_date_create']; ?></p>

                    <em><a href="index.php?action=post&id=<?php echo urlencode($post['post_id']) ?>">Affichage de mon post</a></em>

                    <?php
                    // Partie is_admin, activer les boutons si l'utilisateur connecté est un admin
                    if ($username['is_admin'] === '1') { ?>
                        <button type="button" class="btn btn-primary">Modifier</button>
                    <?php } ?>
                    
                </div>
            </div>
        <?php
        }
        ?>
       

    </body>
</html>