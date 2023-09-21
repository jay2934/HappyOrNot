<?php
session_start();
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
        <button class="inline" id="menu" onclick="_open()">•••</h1>
    </nav>

    <div id="sideBar">
        <a href="../index.php" <?php session_unset(); session_destroy(); ?>>Sign Out</a>
        <a href="#">TryMe</a>
        <a href="#">TryMe</a>
    </div>

    




    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <a href="./creationEvenement.php">
                    <div class="les3evenements">
                        <h1>Creation Evenement</h2> 
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a href="./evenement.php">
                    <div class="les3evenements">
                        <h1>Lancer Evenement</h2> 
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a href="./gestionEvenement.php">
                    <div class="les3evenements">
                        <h1>Gestion Evenement</h2> 
                    </div>
                </a>
            </div>
        </div> 
    </div>

    
    
    <script src="../js/action_accueil.js"></script>
    <script>
        var door = false;

        function _open(){

            if (door == true)
            {
                document.getElementById("sideBar").style.display = "fixed";
                door = false;
            }
            else 
            {
                document.getElementById("sideBar").style.display = "none";
                door = true;
            }
            
        }

    </script>
</body>
</html>