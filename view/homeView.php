<?php

    $title = 'Bienvenue sur mon blog de recettes';

    ob_start();
?>


<section class="section container">
<div class="d-flex justify-content-center pt-1">
    <?php if(isset($_GET['success'])) {
        echo '<p class="alert alert-success">'.htmlspecialchars($_GET['message']).'</p>';
    } 
    else if(isset($_GET['logout'])) {
        echo '<p class="alert alert-success">'.htmlspecialchars($_GET['message']).'</p>';
    } ?>
</div>
    <?php if(isset($_SESSION['connect'])) { ?>
        <h1 class="m-4 text-center">Bienvenue <?= $_SESSION['pseudo'] ?></h1>
    <?php }
    else { ?>
        <h1 class="m-4 text-center">Bienvenue sur mon blog de recettes</h1>
    <?php } ?>

    <p class="text-center">
        Bonjour <?php if(isset($_SESSION['connect'])) { ?><b>
                <?= $_SESSION['pseudo'] ?></b><?php }
                else { ?>visiteur<?php } ?>,
        voici mon blog de recettes, que j'ai réalisé dans le cadre de ma formation de Développeur web.<br>
    </p>
    <p class="text-center">Ce site est réalisé dans le cadre de la formation Believemy.com, et compte pour le projet passerelle #2.</p>
    
    <p class="text-center">
        Le but de ce projet est de réalisé un blog avec une partie inscription puis connexion. Les utilisateurs qui seront authentifiés pourront commenter
        les recettes que j'ai pris le soin d'enregistrer dans la base de données via un formulaire d'administration (étant le seul administrateur).
    </p>
    <p class="text-center">
        Les technologies devant être utilisées pour ce projet sont :
    </p>



    

        <div class="d-flex flex-column justify-content-center align-items-center">

        
                
                
                <ul class="justify-content-center">
                    <li><u>Visuelle / Graphique</u></li>
                        <ul>
                            <li>HTML 5</li>
                            <li>CSS 3</li>
                            <li>SASS</li>
                            <li>Bootstrap 5</li>
                        </ul><br>
                    <li><u>Langage Serveur</u></li>
                        <ul>
                            <li>PHP</li>
                        </ul><br>
                    <li><u>Base de données</u></li>
                        <ul>
                            <li>SQL</li>
                            <li>PhpMyAdmin</li>
                        </ul><br>
                </ul>
            
                
                <div class="container">
                    <div class="text-center">
                        <div class="row m-2 justify-content-center">
                            <div class="col-2">
                                <img class="stacks" src="src/assets/logo/svg/html-5.svg" alt="Logo HTML5">
                            </div>
                            <div class="col-2">
                                <img class="stacks" src="src/assets/logo/svg/CSS.svg" alt="Logo CSS3">
                            </div>
                            <div class="col-2">
                                <img class="stacks" src="src/assets/logo/svg/sass.svg" alt="Logo SASS">
                            </div>
                        </div>

                        <div class="row m-4 justify-content-center">
                            <div class="col-2">
                                <img class="stacks" src="src/assets/logo/svg/Bootstrap.svg" alt="Logo Bootstrap">
                            </div>
                            <div class="col-2">
                                <img class="stackss" src="src/assets/logo/svg/PHP.svg" alt="Logo PHP">  
                            </div>
                            <div class="col-2">
                                <img class="stackss" src="src/assets/logo/svg/mysql.svg" alt="Logo MySQL">
                            </div>
                        </div>

                        <div class="row m-2 justify-content-center">
                            <div class="col-6">
                                <img class="stackss" src="src/assets/logo/svg/phpmyadmin.svg" alt="Logo PHPMyAdmin">
                            </div>
                        </div>
                    </div>
                </div>
        
            
        </div>
        
        

</section>

<?php

    $content = ob_get_clean();

    require('base.php');

?>