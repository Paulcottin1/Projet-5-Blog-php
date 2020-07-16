<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="/public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark navbar navbar sticky-top">
            <a class="navbar-brand" href="#">PAUL COTTIN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="/accueil">Accueil <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active" href="/blog">Blog</a>
                    <a class="nav-item nav-link active" href="/contact">Contact</a>
                    <?php 
                    if(!empty($_SESSION['user'])) { 
                        $user = unserialize($_SESSION['user']); ?>
                        <div class="dropdown menu">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bonjour <?php echo $user->getFirstname()." ".$user->getLastname(); ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php if($user->getRole() == 'admin' ) { ?>
                                    <a class="nav-item nav-link active dropdown-item" href="/admin">Admin</a>
                                <?php } ?>
                                <a class="nav-item nav-link active dropdown-item" href="/mon-compte"> Mon compte</a>
                                <a class="nav-item nav-link active dropdown-item" href="/deconnexion"> Déconnexion</a>
                            </div>
                        </div>     
                    <?php
                    } else { ?>
                        <a class="nav-item nav-link active" href="/connexion">Connexion</a>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </nav>

    </header>
    <body>
        <?php require("view/frontend/$template.php"); ?>
        <?php if(!empty($paging)) {
            require('view/frontend/paging.php');
        } ?>
        <title><?= $title ?></title>
        <footer class="page-footer font-small" style="background: rgb(37,40,45); background: linear-gradient(180deg, rgba(37,40,45,1) 21%, rgba(52,58,64,1) 100%); color:white;">
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>       

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="http://paulcottin.com/"> Paul Cottin</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
    </body>
</html>
