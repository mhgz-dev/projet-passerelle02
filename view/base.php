<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f5f25e8e3a.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="src/assets/images/favicon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="src/design/style.css">
    <title><?= $title ?> | Les délices des îles</title>
</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light p-2 m-0 rounded-5 rounded-top-0">
            <div class="container">
                <a class="navbar-brand p-2 logo" href="index.php?page=home"><i class="fa-solid fa-house"></i>
                    Les Délices des îles 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav logo">
                        <li class="nav-item">
                            <a href="index.php?page=recipes" class="nav-link"><i class="fas fa-utensils"></i> Nos recettes</a>
                        </li>

                        <?php if(!isset($_SESSION['connect'])) { ?> 

                        <li class="nav-item">
                            <a href="index.php?page=connection" class="nav-link"><i class="fa-solid fa-user"></i> Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=registration" class="nav-link"><i class="fa-solid fa-user-plus"></i> S'inscrire</a>

                        <?php }
                        elseif(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) { ?>

                            <li class="nav-item">
                                <a href="index.php?page=admin" class="nav-link"><i class="fa-solid fa-gear"></i> Administration</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=logout" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i> Se Déconnecter</a>
                            </li>

                        <?php }
                        else { ?>

                        </li><li class="nav-item">
                            <a href="index.php?page=logout" class="nav-link">Se Déconnecter</a>
                        </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?= $content ?>

    <footer class="footer rounded-5 rounded-bottom-0">
        © Michaël GOUEZ. Projet Passerelle #2 dans le cadre de la formation Believemy.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>