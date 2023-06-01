<?php

// Objet pour la connexion à la base de données
    class Manager {

        protected function connectionBDD() {

            try {

                $bdd = new PDO('mysql:host=localhost;dbname=prj_passerelle02;charset=utf8', 'root', '');

            }
            catch(Exception $e) {

                throw new Exception('Erreur : '.$e->getMessage());

            }

            return $bdd;
        }
    }