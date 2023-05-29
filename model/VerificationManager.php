<?php

// Objet pour la vérification (email/pseudo/secret/password)
    class Verification extends Manager {

        // Vérification de la syntaxe de l'email
        public static function verificationEmail($email) {

            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            else {
                return false;
            }
        }

        // Vérification de l'existence de l'email
        public static function existingEmail($email) {

            $initBDD = new Manager();
            $bdd = $initBDD->connectionBDD();
            $requete = $bdd->prepare('SELECT COUNT(*) AS existEmail FROM users WHERE email = ?');
            $requete->execute([$email]);

            while($existEmail = $requete->fetch()) {

                if($existEmail['existEmail'] == 0) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }

        // Vérification du doublon de l'email
        public static function duplicateEmail($email) {

            // Initialisation de l'objet Manager pour se connecter à la BDD dans une fonction statique
            $initBDD = new Manager();
            $bdd = $initBDD->connectionBDD();
            $requete = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM users WHERE email = ?');
            $requete->execute([$email]);

            while($emailDoublon = $requete->fetch()) {

                if($emailDoublon['numberEmail'] != 0) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }

        // Vérification du doublon du pseudo
        public static function duplicatePseudo($pseudo) {

            $initBDD = new Manager();
            $bdd = $initBDD->connectionBDD();
            $requete = $bdd->prepare('SELECT COUNT(*) as numberPseudo FROM users WHERE pseudo = ?');
            $requete->execute([$pseudo]);

            while($pseudoDoublon = $requete->fetch()) {

                if($pseudoDoublon['numberPseudo'] != 0) {

                    return true;
                }
                else {
                    return false;
                }
            }
        }

        // Chiffrement du mot de passe
        public static function encryptPassword($password) {

            return 'aq1'.sha1($password.'zqsd').'1208';

        }

        // Création du secret
        public static function createSecret($email) {

            $secret = sha1($email).time();
            $secret = sha1($secret).time();
            return $secret;
        }

        public static function verifImageRecipe($imgRecipe) {

            if($_FILES['imgRecipe']['size'] <= 2000000) {

                $dataImage = pathinfo($_FILES['imgRecipe']['name']);
                $extensionImage = $dataImage['extension'];
                $extensionsArray = ['png', 'gif', 'jpg', 'jpeg', 'bmp'];

                if(in_array($extensionImage, $extensionsArray)) {

                    $newImageName = time().rand().'.'.$extensionImage;
                    move_uploaded_file($_FILES['imgRecipe']['tmp_name'], 'src/uploads/'.$newImageName);
                }
            }

            return $newImageName;
        }

    }