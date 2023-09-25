<?php
session_start();
if(isset($_SESSION['user_id'])) {
    if(isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
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
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>
<body>


    <nav>
        <h1 id="title" class="inline">happyornot</h1>
        <button class="inline" id="menu">•••</button>
        <div id="sideBar">
            <form method="post">
                <input type="submit" name="logout" value="Logout">
            </form>
            <a href="./gestionDeCompte"><h2 id="options">Gestion de Compte</h2></a>
            <a href="./previousData"><h2 id="options">Données Précédant</h2></a>
        </div>
    </nav>

    <a href="./creationEvenement.php">
        <div class="les3evenements">
            <h1>Creation Evenement</h2> 
        </div>
    </a>

    <a href="./evenement.php">
        <div class="les3evenements">
            <h1>Lancer Evenement</h2> 
        </div>
    </a>

    <a href="./gestionEvenement.php">
        <div class="les3evenements">
            <h1>Gestion Evenement</h2> 
        </div>
    </a>

    <script src="../js/action_accueil.js"></script>
</body>
</html>