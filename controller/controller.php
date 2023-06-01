<?php    

    require('model/UserManager.php');
    require('model/ConnectionManager.php');
    require('model/RecipeManager.php');
    require('model/CommentaryManager.php');

    // Fonctions pour l'affichage des pages en fonction des données envoyés dans $_GET
    // Affichage de la page d'accueil
    function home() {
        require('view/homeView.php');
    }

    // Enregistrement des utilisateurs
    function registrationUser($pseudo, $email, $password, $confirmPassword) {

        if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {

            $user = new User($email, $pseudo, $password);
            $user->saveUser($email, $pseudo, $password, $confirmPassword);
            $user->saveSessions();
        }
    }

    // Affichage de l'inscription + Fonction pour l'inscription de l'utilisateur dans la BDD
    function registrationView() {

        if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
            registrationUser(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['confirmPassword']));
        }
        require('view/registrationView.php');
    }
    
    // Affichage des recettes
    function recipesView() {
        $recipeManager = new RecipeManager();
        $requeteRecipe = $recipeManager->getRecipe();
        require('view/recipesView.php');   
    }

    // Affichage de la recette séléctionnée
    function dishView() {

        if(!empty($_POST['commentary']) && isset($_POST['commentary'])) {
            createComment(htmlspecialchars($_POST['commentary']), htmlspecialchars($_GET['id']), htmlspecialchars($_SESSION['user_id']));
        }

        $recipeManager = new RecipeManager();
        $requeteOneDish = $recipeManager->getOneDish();
        $requeteComment = new Commentary();
        $reqComment = $requeteComment->getCommentary();
        require('view/dishView.php');
    }

    // Affichage de l'espace de modification + Fonction pour modifier la recette en BDD
    function modifyView() {

        if(!empty($_POST['title_recipe']) && !empty($_POST['preparation_time']) && !empty($_POST['ingredients']) && !empty($_POST['instructions']) && !empty($_FILES['imgRecipe']) && isset($_GET['id'])) {
            modifyRecipe(htmlspecialchars($_POST['title_recipe']), htmlspecialchars($_POST['ingredients']), htmlspecialchars($_POST['preparation_time']), htmlspecialchars($_POST['instructions']), $_FILES['image'], htmlspecialchars($_GET['id']));
        }
        $recipeManager = new RecipeManager();
        $requeteRecipe = $recipeManager->getRecipe();
        require('view/modifyView.php');
    }

    // Affichage de la page de connexion + Fonction pour se connecter
    function connectionView() {

        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            loginUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
        }
        require('view/connectionView.php');
    }

    // Affichage de la page de création de recette + Fonction pour la création de la recette en BDD
    function adminView() {
        
        if(isset($_POST['title_recipe']) && isset($_POST['preparation_time']) && isset($_POST['ingredients']) && isset($_POST['instructions']) && isset($_FILES['imgRecipe'])) {
            
            createRecipe(htmlspecialchars($_POST['title_recipe']), htmlspecialchars($_POST['ingredients']), htmlspecialchars($_POST['preparation_time']), htmlspecialchars($_POST['instructions']), $_FILES['imgRecipe']);
        }
        require('view/adminView.php');
    }

    // Affichage de la page de suppression + Fonction pour supprimer en BDD
    function deleteView() {
        
        if(isset($_POST['confirmDelete']) && isset($_POST['confirmation'])) {
            $delete = new RecipeManager();
            $delete->deletingRecipe();
        }
        require('view/deleteView.php');
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

    // Connexion des utilisateurs
    function loginUser($email, $password) {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {

            $connec = new ConnectionUser();
            $connec->connectUser($email, $password);
            $connec->autoConnection();
        }
    }

    // Création d'une recette
    function createRecipe($title_recipe, $ingredients, $preparation_time, $instructions, $imgRecipe) {
        $recipe = new RecipeManager();
        $recipe->addRecipe($title_recipe, $ingredients, $preparation_time, $instructions, $imgRecipe);
    }

    // Affichage de la page de modification
    function modifyRecipe($title_recipe, $preparation_time, $ingredients, $instructions, $imgRecipe, $id) {
        
        if(!empty($_POST['title_recipe']) && !empty($_POST['preparation_time']) && !empty($_POST['ingredients']) && !empty($_POST['instructions']) && !empty($_FILES['imgRecipe']) && isset($_GET['id'])) {
            $editRecipe = new RecipeManager();
            $editRecipe->modifyingRecipe($title_recipe, $preparation_time, $ingredients, $instructions, $imgRecipe, $id);
        }
    }

    // Suppression de recette
    function deleteRecipe() {
        $delete = new RecipeManager();
        $delete->deletingRecipe();
    }

    // Création de commentaire
    function createComment($contentComment) {
        $comment = new Commentary();
        $comment->addCommentary($contentComment);
    }