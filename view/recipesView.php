<?php

    $title = 'Voici la liste de nos recettes, régalez vous';

    ob_start();
?>

<section class="section container">

<h1 class="m-4 text-center">Les recettes</h1>

    <?php if(isset($_GET['success'])) {
		echo '<p class="alert alert-success">'.htmlspecialchars($_GET['message']).'</p>';
	}
	else if(isset($_GET['error']) && !empty($_GET['message'])) {
		echo '<p class="alert alert-warning">'.htmlspecialchars($_GET['message']).'</p>';
	} ?>

<!-- Faire l'affichage des recettes avec la requête sur la BDD. -->
     
<div class="recipeCard container">
    <div class="row g-5 mb-3">

<?php
$pathImage = 'src/uploads/';
while($recipe = $requeteRecipe->fetch()) {
?>

    
        <div class="col-md-3">
            
            <div class="card rounded-3">
                <img class="rounded-top imageCard" src="<?= $pathImage.$recipe['image'] ?>" alt="Plat"> 
                
                <div class="card-body">
                    <p class="card-text">
                
                        <p class="text-center"><b><?= $recipe['title_recipe'] ?></b></p>
                        <p class="text-center">Ajoutée le <?= $recipe['creation_date'] ?></p>

                    </p>
                </div>
                <div class="card-footer">   
                <?php if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) { ?>
                    <div class="d-grid">
                        <a class="btn btn-outline-success btn-sm" href="index.php?page=dish&id=<?= $recipe['id'] ?>">Voir la recette</a>
                    </div>
                    <div class="d-grid">
                        <a class="btn btn-outline-primary btn-sm" href="index.php?page=modify&id=<?= $recipe['id'] ?>">Modifier la recette</a>
                    </div>
                    <div class="d-grid">
                        <a class="btn btn-outline-warning btn-sm" href="index.php?page=delete&id=<?= $recipe['id'] ?>">Supprimer la recette</a>
                    </div>
                <?php }
                else { ?>
                    <div class="d-grid">
                        <a class="btn btn-outline-success btn-sm" href="index.php?page=dish&id=<?= $recipe['id'] ?>">Voir la recette</a>
                    </div>
                <?php } ?>
                </div>
            </div>
            
        </div>

    
<?php
}
?>


    </div>
</div>

    
</section>

<?php

    $content = ob_get_clean();

    require('base.php');

?>