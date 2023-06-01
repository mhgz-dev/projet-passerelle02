<?php

// Initialisation des sessions
session_start();

require_once('controller/controller.php');
    


try {
    
    if(isset($_GET['page'])) {

        if($_GET['page'] == 'home') {
            
            home();
            
        }
        else if($_GET['page'] == 'registration') {
            registrationView();
            
            if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {

                registrationUser(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['confirmPassword']));
            
            }
        }
        else if($_GET['page'] == 'recipes') {
            recipesView();
        }
        else if($_GET['page'] == 'dish') {
            
            if(!empty($_POST['commentary']) && isset($_POST['commentary'])) {
                createComment(htmlspecialchars($_POST['commentary']), htmlspecialchars($_GET['id']), htmlspecialchars($_SESSION['user_id']));
            }
            dishView();
        }
        else if($_GET['page'] == 'modify') {

            modifyView();

            if(!empty($_POST['title_recipe']) && !empty($_POST['preparation_time']) && !empty($_POST['ingredients']) && !empty($_POST['instructions']) && !empty($_FILES['imgRecipe']) && isset($_GET['id'])) {
            modifyRecipe(htmlspecialchars($_POST['title_recipe']), htmlspecialchars($_POST['ingredients']), htmlspecialchars($_POST['preparation_time']), htmlspecialchars($_POST['instructions']), $_FILES['image'], htmlspecialchars($_GET['id']));
            }

        }
        else if($_GET['page'] == 'connection') {
            connectionView();

            if(!empty($_POST['email']) && !empty($_POST['password'])) {

                loginUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
            }
        }
        else if($_GET['page'] == 'logout') {
            logout();
        }
        else if($_GET['page'] == 'admin') {
            adminView();
            
        }
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