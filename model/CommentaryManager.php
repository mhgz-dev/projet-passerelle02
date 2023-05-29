<?php

    // Objet pour la gestion des commentaires
    class Commentary extends Manager {

        public function addCommentary($contentComment) {


            $bdd = $this->connectionBDD();
            $reqComment = $bdd->prepare('INSERT INTO commentary(content, recipe_id, user_id) VALUE(?, ?, ?)');
            $result = $reqComment->execute([$contentComment, $_GET['id'], $_SESSION['user_id']]);

            header('location: index.php?page=dish&id='.$_GET['id'].'&success=1');
            exit();
            
        }

        public function getCommentary() {

            $bdd = $this->connectionBDD();
            $reqComment = $bdd->query('SELECT * FROM commentary');
            
            return $reqComment;
        }
    }