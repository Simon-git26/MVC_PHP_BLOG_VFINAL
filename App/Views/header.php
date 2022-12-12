<header id="header">
	<div id="head" class="parallax" parallax-speed="2">
		<h1 id="logo" class="text-center">

			<!-- Infos User Connecté -->
			<?php
			if (!is_null($getUser) || isset($getUser)) {
			?>
				<img class="img-circle" src="App/public/assets/images/guy.jpg" alt="">
				<span class="title"><?= $getUser['username'];?> <?= $getUser['firstname'];?></span>
				
				<span class="tagline"><?= $getUser['slogan'];?></br>
					<p>Pour consultez mon CV:<a href="./App/public/doc/CV_SIMON_BALLEUX-PRUVOST-compressé.pdf" target="_blank" style="color:#bd1550;"> Cliquez Ici</a></p>
				</span>
				<p style="font-size: 2rem;">Pour me suivre: 
					<a href=""><i class="fa fa-twitter fa-2"></i></a>
					<a href=""><i class="fa fa-dribbble fa-2"></i></a>
					<a href=""><i class="fa fa-github fa-2"></i></a>
					<a href=""><i class="fa fa-facebook fa-2"></i></a>
				</p>
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
					<li><a href="?page=blog">Blog</a></li>
					<li><a href="?page=create">Ajouter Post</a></li>

				</ul>
			
			</div>		
		</div>	
	</nav>
</header>