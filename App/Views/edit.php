<!DOCTYPE html>
<html> 
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



    <body class="create">
            
        <main>
            <div class="container">
                <div class=" text-center mt-5 ">
                    <h1 >Modifier un Post !</h1>
                </div>

                <div class="row" style="display: flex;justify-content: center;">
                    <div class="col-lg-7 mx-auto">
                        <div class="card mt-2 mx-auto p-4 bg-light">
                            <div class="card-body bg-light">
                    
                                <div class="container">

                                    <?php if (!is_null($getPost) || isset($getPost)) {
                                    ?>

                                    <form action="" method="post" name="edit" id="post_edit">
                                        <div class="controls">
                                            <div class="row" style="display: flex; align-items:center;">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_title">Titre du Post *</label>
                                                        <input id="form_title" type="text" name="title_post_edit" class="form-control" value="<?= $getPost['post_title']; ?>" required="required" data-error="Le titre est requis.">
                                                    
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="user-select">Choisir un Auteur:</label>
                                                    <select name="users" id="user-select">

                                                    <?php foreach($getUsers as $users) { ?>
                                                        <option value="<?=urlencode($users['id']) ?>"><?=$users['username'];?> <?=$users['firstname'];?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                    </select>
                                                </div>
                                            </div>

                                        

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="form_message">Contenu du post *</label>
                                                        <textarea id="form_message" name="content_post_edit" class="form-control" rows="4" required="required" data-error="Please, leave us a message."><?= $getPost['post_content']; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <input type="submit" name="submit" class="btn btn-primary pt-2 btn-block" value="Modifier" >
                                                    <input type="hidden" name="post_id" value="<?=urlencode($getPost['post_id']) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>