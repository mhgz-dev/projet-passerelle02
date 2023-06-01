<?php

	$title = "Suppression de la recette";
	ob_start();
?>

<section class="section container">

<h1 class="m-4 text-center">Suppression de la recette</h1>

<?php if(isset($_GET['success'])) {
	echo '<p class="alert alert-success">'.htmlspecialchars($_GET['message']).'</p>';
}
else if(isset($_GET['error']) && !empty($_GET['message'])) {
	echo '<p class="alert alert-warning">'.htmlspecialchars($_GET['message']).'</p>';
} ?>

<form action="index.php?page=delete" method="post" enctype="multipart/form-data">
<p>Souhaitez vous vraiment supprimer la recette <b></b><br>
Cette action est irreversible !!!
</p>
<input type="checkbox" id="confirmation" name="confirmation" required>
<label for="confirmation">Je valide la suppression</label>

<input name="confirmDelete" id="confirmDelete" type="submit" value="Je confirme la suppression">
</form>

</section>
<?php

	$content = ob_get_clean();
	require('base.php');

?>