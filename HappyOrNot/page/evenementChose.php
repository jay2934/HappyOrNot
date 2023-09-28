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
    <title>Evenement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>
<body>
<!--
REMEMBER TO START SESSION
FOR THE MAPPING: https://www.w3schools.com/tags/tag_map.asp
-->

<?php
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "root";
    $dbname = "happyornot";


    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->query('SET NAMES utf8');

    $sql = "SELECT id,nom From evenement";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
                    
            ?>
                <div id="container">
                    <h1>Choisi un Événement a Lancer</h1>
                        <form action="" method="post">
                            <select name="Events" size="6" style="width: 200px; font-size: 18pt;">
                                <option value="<?php echo $row["id"];?>"><?php echo $row["nom"];?></option>
                            </select>
                        </form>
                </div>
            <?php
                
        }
            
    } else {
         echo "0 results";
        }
        $conn->close();
    ?>
</body>
</html>