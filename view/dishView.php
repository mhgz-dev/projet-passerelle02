<?php

    $title = "À vous de jouer !!";
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

    <?php
        $pathImage = 'src/uploads/';

        while($oneDish = $requeteOneDish->fetch()) {

            $dateSQL = $oneDish['creation_date'];
            $date = new DateTime($dateSQL);
    ?>

            <h1 class="m-4 text-center"><?= $oneDish['title_recipe'] ?></h1>

                
            <div class="text-center p-2">

                <img class="rounded w-50" src="<?= $pathImage.$oneDish['image'] ?>" alt="<?= $oneDish['title_recipe'] ?>">

                <div class="mt-2">   
                    <p><b>Recette postée le</b> <?= $date->format('d/m/Y H:i:s') ?></p>
                    <p><b>Temps de préparation :</b> <?= $oneDish['preparation_time'] ?> minutes.</p>
                    <p><b>Ingrédients :</b> <?= $oneDish['ingredients'] ?></p>
                    <p><b>Voici comment réaliser ce plat :</b> <br> <?= $oneDish['instructions'] ?></p>
                </div>

                <h2>Bon appétit</h2>
            
            </div>

            <?php if(isset($_SESSION['connect'])) { ?>
                    
                <div class="commentary">

                    <form action="index.php?page=dish&id=<?=$oneDish['id']?>" method="post">
                        <div class="form-floating input-group mt-3">
                            <textarea rows="3" class="form-control" id="commentary" name="commentary"></textarea>
                            <label for="commentary" class="form-label">Votre commentaire</label>
                        </div>

                        <div>
                            <button class="mt-3 mb-5 btn btn-outline-info btn-sm" type="submit">Poster le commentaire</button>
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

            <p>Commentaire postée le <b><?= $commentary['creation_date'] ?></b> par <b><?= $commentary['pseudo'] ?></b></p>
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