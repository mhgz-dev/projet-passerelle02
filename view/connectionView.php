<?php

    $title = 'Connectez-vous.';
    ob_start();

?>

<section class="section container">
    <div class="mt-1">
        <?php if(isset($_GET['error']) && !empty($_GET['message'])) {
            echo '<p class="alert alert-warning">'.htmlspecialchars($_GET['message']).'</p>';
        } ?>
    </div>

    <h1 class="m-4 text-center">Connectez-vous et postez votre recette.</h1>

    <div class="d-flex justify-content-center">

        <form action="index.php?page=connection" method="post" class="form">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email">
                <label for="email" class="form-label">Email</label>    
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password" class="form-label">Mot de passe</label>   
            </div>

            <div>
                <button class="btn btn-outline-success btn-sm" type="submit">Je me connecte</button>
            </div>

            <label id="connect"><input class="mt-3" type="checkbox" name="autoLogon" checked />Se souvenir de moi</label>
        </form>

    </div>

</section>

<?php

    $content = ob_get_clean();
    require('base.php');

?>