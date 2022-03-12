<?php
session_start(); // debut de la session
if(isset($_POST['username']) && isset($_POST['password'])) //isset informe que username et password ne peuvent pas être vide
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'site';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM client  where 
              pseudo = '".$username."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: chargement.html');
        }
        else
        {
           header('Location: logine1.html?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.html?erreur=2'); // utilisateur ou mot de passe vide mais pas utilisé
    }
}
else
{
   header('Location: login.html');
}
mysqli_close($db); // fermer la connexion
?>