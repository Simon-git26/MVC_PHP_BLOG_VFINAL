<!DOCTYPE html>
<html>
    <head>
        <!-- Si le css ne se charge pas, verifier tout simplement dans réseaux si la requete s'effectue -->
        <link rel="stylesheet" href="../MVC_PHP_BLOG_VFINAL/App/public/style.css" />
    </head>

    
    <body>
        <form class="box" action="?page=home" method="post" name="login">
            <h1 class="box-title">Connexion</h1>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
            <input type="password" class="box-input" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion " name="submit" class="box-button">
            <p class="box-register">Vous êtes nouveau ici? <a href="?page=register">S'inscrire</a></p>
        </form>
    </body>
</html>