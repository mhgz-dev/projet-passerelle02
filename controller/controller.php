<?php    

    require('model/UserManager.php');
    require('model/ConnectionManager.php');
    require('model/RecipeManager.php');
    require('model/CommentaryManager.php');

    // Fonctions pour l'affichage des pages en fonction des données envoyés dans $_GET
    function home() {
        require('view/homeView.php');
    }

    function registrationView() {        
        require('view/registrationView.php');
    }

    function recipesView() {
        $recipeManager = new RecipeManager();
        $requeteRecipe = $recipeManager->getRecipe();
        require('view/recipesView.php');   
    }

    function dishView() {
        $recipeManager = new RecipeManager();
        $requeteOneDish = $recipeManager->getOneDish();
        $requeteComment = new Commentary();
        $reqComment = $requeteComment->getCommentary();
        require('view/dishView.php');
    }

    function connectionView() {
        require('view/connectionView.php');
    }

    function modifyView() {
        $recipeManager = new RecipeManager();
        $requeteRecipe = $recipeManager->getRecipe();
        require('view/modifyView.php');

    }

    function deleteView() {

        require('view/deleteView.php');
        if(isset($_POST['confirmDelete']) && isset($_POST['confirmation'])) {
            $delete = new RecipeManager();
            $delete->deletingRecipe();
        }
        
    }

    function modifyRecipe($title_recipe, $preparation_time, $ingredients, $instructions, $imgRecipe, $id) {
        
        if(!empty($_POST['title_recipe']) && !empty($_POST['preparation_time']) && !empty($_POST['ingredients']) && !empty($_POST['instructions']) && !empty($_FILES['imgRecipe']) && isset($_GET['id'])) {
            $editRecipe = new RecipeManager();
            $editRecipe->modifyingRecipe($title_recipe, $preparation_time, $ingredients, $instructions, $imgRecipe, $id);
        }
    }
    
    function adminView() {
        require('view/adminView.php');
    }


    // Enregistrement des utilisateurs
    function registrationUser($pseudo, $email, $password, $confirmPassword) {

        if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {

            $user = new User($email, $pseudo, $password);
            $user->saveUser($email, $pseudo, $password, $confirmPassword);
            $user->saveSessions();
        }
    }

    // Connexion des utilisateurs
    function loginUser($email, $password) {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {

            $connec = new ConnectionUser();
            $connec->connectUser($email, $password);
            $connec->autoConnection();
        }
    }

    // Déconnexion des utilisateurs
    function logout() {
        session_start();
        session_unset();
        session_destroy();

        setcookie('userLogin', '', time() - 1);

        header('location: index.php?page=home&logout=1&message=Vous êtes maintenant déconnecté.');
        exit();
    }

    // Création d'une recette
    function createRecipe($title_recipe, $ingredients, $preparation_time, $instructions, $imgRecipe) {
        $recipe = new RecipeManager();
        $recipe->addRecipe($title_recipe, $ingredients, $preparation_time, $instructions, $imgRecipe);
    }

    function createComment($contentComment) {
        $comment = new Commentary();
        $comment->addCommentary($contentComment);
        
    }

    function deleteRecipe() {
        $delete = new RecipeManager();
        $delete->deletingRecipe();
    }

    