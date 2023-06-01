<?php

    $title = 'Inscrivez vous sur ce blog et postez votre recette';

    ob_start();
?>

<section class="section container">

    <h1 class="m-4 text-center">Créez votre compte pour pouvoir laisser des commentaires</h1>

    <div class="d-flex justify-content-center">
    <form method="post" action="index.php?page=registration" class="form">
       
            
            <?php if(isset($_GET['success'])) {
                echo '<p class="alert alert-success">Inscription réalisée avec succès. Vous pouvez à présent vous <a href=index.php?page=connection>connecter</a>.</p>';
            }
            else if(isset($_GET['error']) && !empty($_GET['message'])) {
                echo '<p class="alert alert-warning">'.htmlspecialchars($_GET['message']).'</p>';
            } ?>
            
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email">
            <label for="email" class="form-label">Entrez votre email :</label>
            
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="pseudo" name="pseudo">
            <label for="pseudo" class="form-label">Entrez votre pseudo :</label>
            
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password">
            <label for="password" class="form-label">Entrez votre mot de passe :</label>
            
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            <label for="confirmPassword" class="form-label">Confirmez votre mot de passe :</label>
            
        </div>

        <div>
            <button class="btn btn-outline-success btn-sm" type="submit">Je m'inscris.</button>
        </div>

    
    </form>
    </div>
</section>

<?php

    $content = ob_get_clean();
    require('base.php');

?>
