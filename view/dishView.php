<?php

    $title = "Page d'administration";

    ob_start();
?>

<section class="container">

    <?php
        $pathImage = 'src/uploads/';
        while($oneDish = $requeteOneDish->fetch()) {
    ?>
    <h1 class="m-4 text-center"><?= $oneDish['title_recipe'] ?></h1>

    <?php if(isset($_GET['success'])) {
        echo '<p class="alert alert-success">Votre commentaire à bien été ajouté.</p>';
    }
    else if(isset($_GET['error']) && !empty($_GET['message'])) {
        echo '<p class="alert alert-warning">'.htmlspecialchars($_GET['message']).'</p>';
    } ?>
    <div class="text-center p-2">

        <img class="rounded w-25" src="<?= $pathImage.$oneDish['image'] ?>" alt="Plat">

    <div class="mt-2">   

        <p><b>Recette postée le</b> <?= $oneDish['creation_date'] ?></p>

        <p><b>Temps de préparation :</b> <?= $oneDish['preparation_time'] ?> minutes.</p>

        <p><b>Ingrédients :</b> <?= $oneDish['ingredients'] ?></p>

        <p><b>Voici comment réaliser ce plat :</b> <br> <?= $oneDish['instructions'] ?></p>
    </div> 
    
    </div>
    <?php if(isset($_SESSION['connect'])) { ?>
        
        <div class="">    
            <form action="index.php?page=dish&id=<?=$oneDish['id']?>" method="post">
                <div class="form-floating input-group mt-3">
                    <textarea rows="3" class="form-control" id="commentary" name="commentary"></textarea>
                    <label for="commentary" class="form-label">Votre commentaire</label>
                </div>
                <div>
                    <input class="mt-3" type="submit" value="Poster le commentaire">
                </div>
            </form>
        </div>


    <?php }
    else { ?>
        <div class="d-flex justify-content-center">
            <h4 class="alert alert-warning">Veuillez vous connecter ou vous inscrire pour laisser des commentaires.</h4>
        </div>
    <?php } ?>
    

<?php
    }
?>

<div>

<?php

while($commentary = $reqComment->fetch()) {

    if($commentary['recipe_id'] == $_GET['id']) {
?>
<p>Commentaire postée le <b><?= $commentary['creation_date'] ?></b> par <b><?= $commentary['user_id'] ?></b></p>

<p><b><?= $commentary['content'] ?></b></p>

<?php
}
}
?>
</div>

    


</section>


<?php
    $content = ob_get_clean();

    require('base.php');

?>