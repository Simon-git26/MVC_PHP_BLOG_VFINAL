<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../public/css/style.css">

	</head>
	<body>

    <?php 
    /*

    // Fonction PHP pour hasher mes mots de passe
    echo password_hash('admin', PASSWORD_DEFAULT); 

    */

    ?>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Connexion</h2>
                </div>
            </div>

            
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(../public/images/bg-1.jpg);"></div>
                            <div class="login-wrap p-4 p-md-5">


                                <?php /*
                                echo $user['user_firstname'];
                                */
                                ?>

                                

                                <form action="/MVC_PHP_BLOG_VFINAL?page=login" method="POST" class="signin-form">
                                    <div class="form-group mt-3">
                                        <label class="form-control-placeholder" for="username">Nom Utilisateur</label>
                                        <input type="text" class="form-control" required>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-placeholder" for="password">Mot de Passe</label>
                                        <input id="password-field" type="password" class="form-control" required>
                                        
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Connexion</button>
                                    </div>


                                    <!--
                                    <div class="form-group d-md-flex">
                                        <div class="w-50 text-left">
                                            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                                <input type="checkbox" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="w-50 text-md-right">
                                            <a href="#">Forgot Password</a>
                                        </div>
                                    </div>
                                    -->
                                </form>

                                <p class="text-center">Vous n'êtes pas membres ? <a data-toggle="tab" href="#signup">Incrivez-vous !</a></p>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>

	<script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/popper.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/main.js"></script>

	</body>
</html>

