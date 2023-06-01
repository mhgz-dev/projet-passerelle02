<?php

    require_once('Manager.php');
    require_once('VerificationManager.php');


    // Objet pour la connexion de l'utilisateur
    class ConnectionUser extends Manager {

        // Fonction pour la connexion de l'utilisateur
        public function connectUser($email, $password) {

            // Vérification de l'existence de l'email
            if(Verification::existingEmail($email)) {

                header('location: index.php?page=connection&error=1&message=Adresse email inexistante.');
                exit();
            }
            
            // Vérification de la syntaxe de l'email
            if(!Verification::verificationEmail($email)) {

                header('location: index.php?page=connection&error=1&message=Votre adresse email est invalide.');
                exit();
            }

            // Chiffrement du mot de passe
            $password = Verification::encryptPassword($password);

            // Connexion
            $bdd = $this->connectionBDD();
            $requete = $bdd->prepare('SELECT * FROM users WHERE email = ?');
            $requete->execute([$email]);

            while($user = $requete->fetch()) {

                if($password == $user['password']) {

                    $_SESSION['connect']    = 1;
                    $_SESSION['email']      = $user['email'];
                    $_SESSION['pseudo']     = $user['pseudo'];
                    $_SESSION['admin']      = $user['administration'];
                    $_SESSION['user_id']    = $user['id'];

                    // Création du cookie pour l'utilisateur
                    if(isset($_POST['autoLogon'])) {

                        setcookie('userLogin', $user['secret'], time() + 365*24*3600, '/', null, false, true);
                    }

                    header('location: index.php?page=home&success=1&message=Vous êtes maintenant connecté.');
                    exit();
                }
                else {

                    header('location: index.php?page=connection&error=1&message=Votre mot de passe est invalide.');
                    exit();
                }
            }
        }

        // Création du cookie pour la connexion automatique
        public function autoConnection() {

            if(isset($_COOKIE['userLogin']) && !isset($_SESSION['connect'])) {

                // Sécurisation du secret
                $secret = htmlspecialchars($_COOKIE['userLogin']);

                // Connexion à la BDD
                $bdd = $this->connectionBDD();
                $requete = $bdd->prepare('SELECT COUNT(*) AS secretNumber FROM user WHERE secret = ?');
                $requete->execute([$secret]);

                while($user = $requete->fetch()) {

                    if($user['secretNumber'] == 1) {

                        $informationsUser = $bdd->prepare('SELECT * FROM user WHERE secret = ?');
                        $informationsUser->execute([$secret]);

                        while($userInformations = $informationsUser->fetch()) {

                            $_SESSION['connect'] = 1;
                            $_SESSION['email']   = $userInformations['email'];
                            
                            // if(Verification::verificationAdmin($userInformations['email'])) {

                            //     $_SESSION['admin'] = 1;
                            // }
                            
                        }
                    }
                }
            }
        }
    }