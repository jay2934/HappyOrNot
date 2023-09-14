<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style_index.css">

</head>
<body>
    <?php
        //SESSION START VARIABLE
        $_SESSION["connexion"] = true;
        $_SESSION["connexion"];
        //SESSION START VARIABLE






        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST['userName'];
            $password = $_POST['password'];

            $password = sha1($password,false);

            $servername = "localhost";
            $usernameDB = "root";
            $passwordDB = "root";
            $dbname = "happyornot";

            $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

            if($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM login WHERE userName='$user' AND password='$password'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["connexion"] = true;
                $_SESSION["connexion"] = true;
                $_SESSION["connexion"];
                header('Location: ./page/accueil.php');
                //GESTION WHEN LOGGED IN
            }
            else {
                //GESTION ERREUR
                echo "<h2>Nom d'usager ou mot de passe invalide</h2>";
            }
            $conn->close();
        }
        ?>



    <h1>Login</h1>
    <form action="" method="post">
        <p>Nom Utilisateur:</p><input type="text" name="userName" id="userName">
        <p>Mot de Passe:</p><input type="password" name="password" id="password">
        <input type="submit">
    </form>
    
</body>
</html>
