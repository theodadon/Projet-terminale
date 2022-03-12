<?php
                session_start(); //début de la session 
                $db_username = 'root';
                $db_password = '';
                $db_name     = 'site';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) //connexion bdd
                       or die('could not connect to database');
              // récupère les données du formulaire
                $user = $_POST['username'];
                $ville = $_POST['ville'];
                $pays = $_POST['pays'];
                $codepostale = $_POST['codepostale'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $adresse = $_POST['adresse'];
                $password = $_POST['password'];
                $mail = $_POST['email'];
                // requête sql
                $requete1 = "INSERT INTO client (pseudo,nom,prenom,adresse,ville,codepostal,pays,mail,mdp)
                             VALUES ('".$user."','".$nom."','".$prenom."','".$adresse."','".$ville."','".$codepostal."','".$pays."','".$mail."','".$password."')";
                $exec_requete1 = mysqli_query($db,$requete1); // envoi la requête
                $reponse1      = mysqli_fetch_array($exec_requete1); // recupère la réponse
                header('Location: login.html'); // ammène sur la page de login

?>