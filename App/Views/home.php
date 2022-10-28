<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8" />
    	<title>Blog PHP Mvc</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>

	<body>
    	<h1>Toto Titre !</h1>
    	
        <div class="d-flex">
            <?php
            foreach ($posts as $post) {
            ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post['post_title']; ?></h5>
                        <p class="card-text"><?php echo $post['post_content']; ?></p>
                        <p class="card-text"><?php echo $post['post_date_create']; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

	</body>
</html>