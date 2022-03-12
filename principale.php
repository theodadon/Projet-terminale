<?php
                session_start(); //début de la session
                $db_username = 'root';
                $db_password = '';
                $db_name     = 'site';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
                       or die('could not connect to database');
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                }
                // requête sql pour récuperer la ville 
                $requete = "SELECT ville FROM client where 
                        pseudo = '".$user."'";
                $exec_requete = mysqli_query($db,$requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $ville = $reponse['ville'];
?>
<html>

<head>  
    <meta charset="utf-8"><!-- meta pour le bon fonctionnement  -->
    <meta bame="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><!-- fin du méta  -->   
    <title> Compte </title> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" /> <!-- css pour la carte  -->
    <link rel="stylesheet" type=text/css href="css\prin.css" </link> <!-- css de la page  -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script> <!-- bibliothèque js de la carte  -->
</head>
<body>
    <h1>Votre compte</h1>            
    <form action="changement.html" method="post" class="form"> <!-- définit l'action du bouton  -->
        <button type="submit" class="button1">Quelque chose vous déplaît ? Changez le !</button>
    </form><!-- fin de la définition de l'action  -->
    <div class="container"> <!-- affichage de la barre et des lat/lon  -->
        <b>Coordonées</b>
        <form>
            <input type="text" name="lat" id="lat" size=12 value="">
            <input type="text" name="lon" id="lon" size=12 value="">
        </form>
        <b>Ville</b>
        <div id="search" class="search1">
            
            <input type="text" name="addr" value="
<?php
    echo htmlspecialchars($ville);
?>
" id="addr" size="58" class="input_text" /><!-- met la ville récupérée directement dans la barre de recherche en php  -->
            <button type="button" onclick="addr_search();" class="submit">Rechercher</button>
            <div id="results"></div>
        </div>
        <br />
    </div><!-- fin de l'affichage de la barre et des lat/lon -->     
    <div class="carte"><!-- affichage de la carte  -->
        <div id="map"></div>
        <script src="javascript\carte.js"></script>
    </div> <!-- fin de l'affichage de la carte  -->
    <div class="container"> <!-- affichage de la météo -->
        <div class="card">
            <h1 class="name" id="name"></h1>
            <p class="temp"></p>
            <p class="clouds"></p>
            <p class="desc"></p>
        </div>
        <script src="javascript\meteo.js"></script>
    </div> <!-- fin de l'affichage météo  -->
</body>
</html>
