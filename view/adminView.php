<?php

	$title = "Page d'administration";
	ob_start();
?>

<section class="container">

<h1 class="m-4 text-center">Création de la recette</h1>

<div class="d-flex justify-content-center">


	<form action="index.php?page=admin" method="post" enctype="multipart/form-data" class="form">

<?php if(isset($_GET['success'])) {
	echo '<p class="alert alert-success">La recette est bien enregistrée.</p>';
}
else if(isset($_GET['error']) && !empty($_GET['message'])) {
	echo '<p class="alert alert-warning">'.htmlspecialchars($_GET['message']).'</p>';
} ?>

	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="title_recipe" name="title_recipe">
		<label for="title_recipe" class="form-label">Titre de la recette</label>
	</div>

	<div class="form-floating input-group mb-3">
		<input type="number" min="1" class="form-control" id="preparation_time" name="preparation_time">
		<label for="preparation_time" class="form-label">Temps de préparation</label>
		<span class="input-group-text">Minutes</span>
	</div>

	
		<div class="form-floating mb-3">
			<textarea class="form-control" id="ingredients" name="ingredients"></textarea>
			<label for="ingredients" class="form-label">Ingrédients</label>
		</div>   
	

	<div class="form-floating input-group mt-3">
		<textarea rows="3" class="form-control" id="instructions" name="instructions"></textarea>
		<label for="instructions" class="form-label">Préparation :</label>
	</div>

	<div class="mt-5">
		<label for="imgRecipe" class="form-label">Ajouter une photo pour votre recette</label>
		<input class="form-control" type="file" id="imgRecipe" name="imgRecipe">
	</div>
	
	<div>
		<button class="btn btn-outline-success mt-3" type="submit">Poster la recette</button>
	</div>
	
	</form>
</div>

</section>
<?php

	$content = ob_get_clean();
	require('base.php');

?>