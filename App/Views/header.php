<header id="header">
	<div id="head" class="parallax" parallax-speed="2">
		<h1 id="logo" class="text-center">

			<!-- Infos User Connecté -->
			<?php


			var_dump($user);
			echo '</br>';


			if (!is_null($user) || isset($user)) {
			?>
				<img class="img-circle" src="App/public/assets/images/guy.jpg" alt="">
				<span class="title"><?= $user['username'];?></span>
				<span class="tagline">Developpeur Web<br>
					<a href=""><?= $user['email'];?></a>
				</span>
			<?php
			}


			?>
		</h1>
	</div>

	<nav class="navbar navbar-default navbar-sticky">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			
			<div class="navbar-collapse collapse">
				
				<ul class="nav navbar-nav">
					<li class="active"><a href="?page=home">Accueil</a></li>
					<li><a href="?page=home">A Propos</a></li>
					<li><a href="?page=home">Blog</a></li>
				</ul>
			
			</div>		
		</div>	
	</nav>
</header>