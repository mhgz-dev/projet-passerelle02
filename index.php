<?php

// Initialisation des sessions
session_start();

require_once('controller/controller.php');
    


try {
    
    if(isset($_GET['page'])) {

        // Affichage de la page d'accueil
        if($_GET['page'] == 'home') {
            home();
        }

        // Page d'enregistrement de compte utilisateur
        else if($_GET['page'] == 'registration') {
            registrationView();
        }

        // Affichage des toutes les recettes en BDD
        else if($_GET['page'] == 'recipes') {
            recipesView();
        }

        // Affichage de la recette sélectionnée + Fonction d'ajout de commentaires
        else if($_GET['page'] == 'dish') {
            dishView();
        }

        // Fonction de modification de recette
        else if($_GET['page'] == 'modify') {
            modifyView();
        }

        // Connexion des utilisateurs
        else if($_GET['page'] == 'connection') {
            connectionView();
        }

        // Déconnexion
        else if($_GET['page'] == 'logout') {
            logout();
        }

        // Ajout de recette
        else if($_GET['page'] == 'admin') {
            adminView();
        }

        // Suppression de recette
        else if($_GET['page'] == 'delete') {
            deleteView();
            $_SESSION['id_recipe'] = $_GET['id'];  
        }
        else {
            throw new Exception("Cette page n'existe pas ou a été supprimée.");
        }
    }
    else {
        home();
    }
}
catch(Exception $e) {        
    $error = $e->getMessage();
    require('view/errorView.php');
}