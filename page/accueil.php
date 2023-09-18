<?php
session_start();
$_SESSION["connection"] = true; //enlever a la fin
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style_accueil.css">
</head>
<body>
    <nav>
        <h1 id="title" class="inline">happyornot</h1>
        <h1 id="menu" class="inline" onclick="menu()">•••</h1>
    </nav>

    <a href="./creationEvenement.php">
        <div class="Les3Evenement">
            <h1>Creation Evenement</h2> 
        </div>
    </a>
    
    <a href="./evenement.php">
        <div class="Les3Evenement">
            <h1>Lancer Evenement</h2> 
        </div>
    </a>
    
    <a href="./gestionEvenement.php">
        <div class="Les3Evenement">
            <h1>Gestion Evenement</h2> 
        </div>
    </a>

    
    <script src="../js/action_accueil.js"></script>
</body>
</html>