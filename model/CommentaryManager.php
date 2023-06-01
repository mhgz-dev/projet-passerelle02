<?php

    // Objet pour la gestion des commentaires
    class Commentary extends Manager {

        // Fonction pour l'ajout de commentaires
        public function addCommentary($contentComment) {

            $bdd = $this->connectionBDD();
            $reqComment = $bdd->prepare('INSERT INTO commentary(content, recipe_id, user_id) VALUE(?, ?, ?)');
            $result = $reqComment->execute([$contentComment, $_GET['id'], $_SESSION['user_id']]);

            header('location: index.php?page=dish&id='.$_GET['id'].'&success=1&message=Votre commentaire est bien ajouté.');
            exit(); 
        }
        
        // Affichage des commentaires en BDD en fonction de la recette + jointure interne pour affichage du pseudo lié au commentaire.
        public function getCommentary() {

            $bdd = $this->connectionBDD();
            $reqComment = $bdd->query('SELECT c.creation_date, content, recipe_id, user_id, pseudo, u.id
                                    FROM commentary c, users u
                                    WHERE u.id = c.user_id');
            return $reqComment;
        }
    }