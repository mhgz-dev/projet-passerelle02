<?php

    // Objet pour la création et l'affichage des recettes en BDD
    class RecipeManager extends Manager {

        // Ajout d'une recette
        public function addRecipe($title_recipe, $ingredients, $preparation_time, $instructions, $imgRecipe) {

            $imageName = Verification::verifImageRecipe($imgRecipe);
            $bdd = $this->connectionBDD();
            $requeteRecipe = $bdd->prepare('INSERT INTO recipes(title_recipe, ingredients, preparation_time, instructions, image) VALUES(?, ?, ?, ?, ?)');
            $result = $requeteRecipe->execute([$title_recipe, $ingredients, $preparation_time, $instructions, $imageName]);
            
            header('location:index.php?page=admin&success=1&message=Recette ajoutée avec succès.');
            exit();
        }
        
        // Affichage des recettes sur la page recipesView.php
        public function getRecipe() {

            $bdd = $this->connectionBDD();
            $requeteRecipe = $bdd->query('SELECT * FROM recipes');

            return $requeteRecipe;
        }

        // Affichage du détail d'une recette sur la page dishView.php
        public function getOneDish() {

            $bdd = $this->connectionBDD();
            $requeteOneDish = $bdd->prepare('SELECT * FROM recipes WHERE id = ?');
            $requeteOneDish->execute([htmlspecialchars($_GET['id'])]);

            return $requeteOneDish;
        }

        // Modification d'une recette
        public function modifyingRecipe($title_recipe, $preparation_time, $ingredients, $instructions, $imgRecipe, $id) {

            $imageName = Verification::verifImageRecipe($imgRecipe);

            $bdd = $this->connectionBDD();
            $requeteRecipe = $bdd->prepare('UPDATE recipes SET title_recipe=:title_recipe, preparation_time=:preparation_time, ingredients=:ingredients, instructions=:instructions, image=:imgRecipe WHERE id=:id');
            $resultModification = $requeteRecipe->execute([
                ':title_recipe'         => $title_recipe,
                ':preparation_time'     => $preparation_time,
                ':ingredients'          => $ingredients,
                ':instructions'         => $instructions,
                ':imgRecipe'            => $imageName,
                ':id'                   => $id
            ]);
        }

        // Suppression d'une recette
        public function deletingRecipe() {

            $bdd = $this->connectionBDD();
            $requeteRecipe = $bdd->prepare('DELETE FROM recipes WHERE id = ?');
            $deleting = $requeteRecipe->execute([htmlspecialchars($_SESSION['id_recipe'])]);
            $image = $deleting['image'];
            unlink('./src/uploads/'.$image.'');
        
            header('location: index.php?page=recipes&success=1&message=Recette supprimée avec succès.');
            exit();
        }
    }  