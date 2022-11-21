<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../MVC_PHP_BLOG_VFINAL/App/public/style.css" />
</head>
    <body>
        <form class="box" action="?page=login" method="post">
            <h1 class="box-title">S'inscrire</h1>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
            <input type="text" class="box-input" name="email" placeholder="Email" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register">Déjà inscrit? <a href="?page=login">Connectez-vous ici</a></p>
        </form>
    </body>
</html>