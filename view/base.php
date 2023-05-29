<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="src/assets/images/favicon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="src/design/style.css">
    <title><?= $title ?> | Mon blog de recettes</title>
</head>
<body>

<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark p-2 m-0 rounded-bottom">
        <div class="container">
            <a class="navbar-brand text-white p-2 logo" href="index.php?page=home">
                Les Délices des îles 
            </a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav logo">
                <li class="nav-item">
                    <a href="index.php?page=home" class="nav-link text-white">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=recipes" class="nav-link text-white">Nos recettes</a>
                </li>
                <?php if(!isset($_SESSION['connect'])) { ?>                        
                <li class="nav-item">
                    <a href="index.php?page=connection" class="nav-link text-white">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=registration" class="nav-link text-white">S'inscrire</a>
                <?php }
                elseif(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) { ?>
                <li class="nav-item">
                    <a href="index.php?page=admin" class="nav-link text-white">Administration</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=logout" class="nav-link text-white">Se Déconnecter</a>
                </li>
                <?php }
                else { ?>
                </li><li class="nav-item">
                    <a href="index.php?page=logout" class="nav-link text-white">Se Déconnecter</a>
                </li>
                <?php } ?>

                
            </ul>
        </div>
        </div>
    </nav>
</header>

<?= $content ?>

    <footer class="footer rounded-top">
        © Michaël GOUEZ. Projet Passerelle #2 dans le cadre de la formation Believemy.
    </footer>


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>    
</body>
</html>