<?php

    require('Manager.php');
    require('VerificationManager.php');

    // Objet pour le management des utilisateurs
    class User extends Manager {

        // ATTRIBUTS
        private $_email;
        private $_pseudo;
        private $_password;
        private $_secret;

        // CONSTRUCTEUR
        public function __construct($email, $pseudo, $password) {

            $this->setEmail($email);
            $this->setPseudo($pseudo);
            $this->setPassword($password);

        }

        // GETTERS
        public function getEmail() {
            return $this->_email;
        }

        public function getPseudo() {
            return $this->_pseudo;
        }

        public function getPassword() {
            return $this->_password;
        }

        public function getSecret() {
            return $this->_secret;
        }


        // SETTERS
        public function setEmail($email) {
            $this->_email = $email;
        }

        public function setPseudo($pseudo) {
            $this->_pseudo = $pseudo;
        }
        
        public function setPassword($password) {
            $this->_password = $password;
        }
        public function setSecret($secret) {
            $this->_secret = $secret;
        }


        // METHODES

        // Enregistrement de l'utilisateur
        public function saveUser($email, $pseudo, $password, $confirmPassword) {

            // Vérification de l'adresse mail
            if(!Verification::verificationEmail($email)) {

                header('location: index.php?page=registration&error=1&message=Votre adresse email est invalide.');
                exit();
            }

            // Vérification du doublon de l'email
            if(Verification::duplicateEmail($email)) {

                header('location: index.php?page=registration&error=1&message=Cette adresse est déjà utilisée.');
                exit();
            }

            // Vérification du pseudo en doublon dans la BDD   
            if(Verification::duplicatePseudo($pseudo)) {

                header('location: index.php?page=registration&error=1&message=Votre pseudo est déjà utilisé.');
                exit();
            }

            // Vérification de la concordance des 2 mdp.
            if($password === $confirmPassword) {

                require_once('Manager.php');

                // Chiffrement du mot de passe
                $this->setPassword(Verification::encryptPassword($password));
                $this->setSecret(Verification::createSecret($email));

                // // Secret
                // $secret = sha1($email).time();
                // $secret = sha1($secret).time();

                $bdd = $this->connectionBDD();
                $requete = $bdd->prepare('INSERT INTO users(email, pseudo, password, secret) VALUES(?, ?, ?, ?)');
                $requete->execute([
                    $this->getEmail(),
                    $this->getPseudo(),
                    $this->getPassword(),
                    $this->getSecret()
                ]);

                header('location: index.php?page=registration&success=1');
                exit();
            }
            else {
                header('location: index.php?page=registration&error=1&message=Les mots de passes ne sont pas identiques.');
                exit();
            }


        }

        //Sauvegarde de la session
        public function saveSessions() {    

            $_SESSION['connect']    = 1;
            $_SESSION['pseudo']     = $this->getPseudo();
            $_SESSION['email']      = $this->getEmail();
            $_SESSION['admin'];
            $_SESSION['user_id'];
            $_SESSION['id_recipe'];
 
        }

    }