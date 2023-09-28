<?php
//DONE !!!
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
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>
<body>
    <?php

        $userName= $password = $id = "";
        $userNameErreur = $passwordErreur = $wrongAns = "";
        $erreur = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            
            if(empty($_POST['userName'])){
                $userNameErreur = "Le User Name ne peut pas etre vide";
                $erreur = true;
            }
            else{
                $userName = trojan($_POST['userName']);
            }

            if(empty($_POST['password'])){
                $passwordErreur = "Le mot de passe ne peut pas etre vide";
                $erreur = true;
            }
            else{
                $password = trojan($_POST['password']);
            }
            if ($erreur == false){

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

                    $sql = "SELECT id FROM login WHERE userName='$user' AND password='$password'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $_SESSION["connexion"] = true;

                        $_SESSION['user_id'] = $row['id'];
       
                        header('Location: ./page/accueil.php');
                        //GESTION WHEN LOGGED IN
                    }
                    else {
                        //GESTION ERREUR
                        $wrongAns = "<p>Nom d'usager ou mot de passe invalide<p>";
                        $erreur = true;
                    }
                    $conn->close();
                }
            }
        }
        if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == true){
    ?>
    
    <!--FORM HTML-->
    <div id="container">
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p>Nom Utilisateur:</p><input type="text" name="userName" id="userName" class="inputfield">
            <p>Mot de Passe:</p><input type="password" name="password" id="password" class="inputfield">
            <input type="submit" id="submit">
            <br>
            <p><?php echo $userNameErreur; ?></p>
            <p><?php echo $passwordErreur; ?></p>
            <p><?php echo $wrongAns; ?></p>
        </form>
    </div>
    
    <?php
    }
    function trojan($data){
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    ?>
</body>
</html>
<!--privé-->