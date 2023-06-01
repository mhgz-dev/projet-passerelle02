<?php

    $title = "Une erreur s'est produite.";

    ob_start();
?>

<section class="section container">

    <p class=m-5>Une erreur s'est produite. Veuillez suivre ce lien pour revenir à l'<a href="index.php?page=home">accueil</a>.</p>

    <p class=m-5><?= $error ?></p>

</section>

<?php

    $content = ob_get_clean();
    require('base.php');
    
?>