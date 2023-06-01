<?php

    $title = 'Voici la liste de mes recettes, régalez-vous';
    ob_start();

?>

<section class="section container">

    <div class="mt-1">
        <?php if(isset($_GET['success'])) {
            echo '<p class="alert alert-success">'.htmlspecialchars($_GET['message']).'</p>';
        } 
        else if(isset($_GET['error'])) {
            echo '<p class="alert alert-success">'.htmlspecialchars($_GET['message']).'</p>';
        } ?>
    </div> 

    <h1 class="m-4 text-center">Les recettes</h1>


     
<div class="recipeCard container">

    <div class="row g-5 mb-3 mt-3">

        <?php
            $pathImage = 'src/uploads/';

            while($recipe = $requeteRecipe->fetch()) {

            $dateSQL = $recipe['creation_date'];
            $date = new DateTime($dateSQL);
        ?>

        <div class="col-md-3">
            
            <div class="card rounded-3">
                <img class="rounded-top imageCard" src="<?= $pathImage.$recipe['image'] ?>" alt="<?= $recipe['title_recipe'] ?>"> 
                
                <div class="card-body">
                    <p class="card-text">
                        <p class="text-center"><b><?= $recipe['title_recipe'] ?></b></p>
                    </p>
                </div>

                <div class="card-footer">   
                    <?php if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) { ?>
                        <div class="d-grid">
                            <a class="btn btn-outline-success btn-sm" href="index.php?page=dish&id=<?= $recipe['id'] ?>">Voir la recette</a>
                        </div>
                        <div class="d-grid">
                            <a class="btn btn-outline-info btn-sm" href="index.php?page=modify&id=<?= $recipe['id'] ?>">Modifier la recette</a>
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