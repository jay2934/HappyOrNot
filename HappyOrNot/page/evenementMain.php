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
    <link rel="stylesheet" href="../css/evenementMain.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>
<body>
    <!--
        REMEMBER TO START SESSION
        FOR THE MAPPING: https://www.w3schools.com/tags/tag_map.asp
        NEEDS CSS!!!
        NEEDS DEBUGGING
    -->
    <?php
        $id = $_GET['id'];
        
        $length = strlen($id);
        $numero = substr($id, 0, $length - 1);
        $lettre = substr($id, -1);             

        $good = 0;
        $mid  = 0;
        $bad  = 0;
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4" id="col1" style="background:black; height:100vh; display:flex; justify-content:center;">
                <img src="../img/happy.png" alt="Happy" width="350vw">
            </div>
            <div class="col-4" id="col2" style="background:black; height:100vh; display:flex; justify-content:center;">
                <img src="../img/Medium.png" alt="Meh" width="350vw">
            </div>
            <div class="col-4" id="col3" style="background:black; height:100vh; display:flex; justify-content:center;">
                <img src="../img/hangry.png" alt="Mad" width="350vw">
            </div>
        </div>
    </div>




    <script src="../js/mainEvent.js"></script>
    <script>
        // Initialize variables
        let good = <?php echo $good; ?>;
        let mid = <?php echo $mid; ?>;
        let bad = <?php echo $bad; ?>;

        // Add click event listeners to the col elements
        document.getElementById('col1').addEventListener('click', function() {
            good++; // Increment good
            alert('Good: ' + good); // Display updated value (you can replace this with your desired display logic)
        });

        document.getElementById('col2').addEventListener('click', function() {
            mid++; // Increment mid
            alert('Mid: ' + mid); // Display updated value
        });

        document.getElementById('col3').addEventListener('click', function() {
            bad++; // Increment bad
            alert('Bad: ' + bad); // Display updated value
        });

        window.addEventListener('beforeunload', function(e) {
            // You can perform actions here before the page is closed.
            // For example, you can save data or show a confirmation prompt to the user.
            // You can use the values of `good`, `mid`, and `bad` here as needed.
            <?php ?>
            // For demonstration purposes, we'll show a confirmation prompt.
            const confirmationMessage = 'Are you sure you want to leave this page?';
            e.returnValue = confirmationMessage; // This message will be displayed to the user as a confirmation prompt.
        });
    </script>
</body>