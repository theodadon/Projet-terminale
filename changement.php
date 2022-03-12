<?php
                session_start(); //début de la session
                $db_username = 'root';
                $db_password = '';
                $db_name     = 'site';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) //connexion
                       or die('could not connect to database');
                if($_SESSION['username'] !== ""){ // recupère les données du formulaire
                    $user = $_POST['username'];
                    $ville = $_POST['ville'];
                    $pays = $_POST['pays'];
                    $codepostale = $_POST['codepostale'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $adresse = $_POST['adresse'];
                    $password = $_POST['password'];
                }
                // requête sql pour avoir l'id
                $requete = "SELECT Id FROM client  where 
                        pseudo = '".$user."' and Mdp = '".$password."' ";
                $exec_requete = mysqli_query($db,$requete); //envoi de la requête
                $reponse      = mysqli_fetch_array($exec_requete); //récupère la réponse
                $id = $reponse['Id'];
                
                $requete1 = "UPDATE client
                             SET pseudo = '".$user."',
                                 ville = '".$ville."',
                                 mdp = '".$password."',
                                 codepostal = '".$codepostale."',
                                 pays = '".$pays."',
                                 nom = '".$nom."',
                                 prenom = '".$prenom."',
                                 adresse = '".$adresse."'
                             where Id = '".$id."'"; //envoi 2ème requête sql pour modifier 
                $exec_requete1 = mysqli_query($db,$requete1); //envoi de la requête
                $reponse1      = mysqli_fetch_array($exec_requete1); //récupère la réponse
                header('Location: login.html'); // redirection vers login

?>