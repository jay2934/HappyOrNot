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
    <title>Creation Evenement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/creation_evenment.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>
<body>
    
    <?php  

        $eventName = $dateTime = $lieu = $departement = "";
        $eventNameErreur = $dateTimeErreur = $lieuErreur = $departementErreur = "";
        $erreur = false;
        $dateFormat = "Y-m-d H:i:s";
        $departementListe = [
            'Biologie',
            'Éducation Physique',
            'Mathématiques',
            'Chimie',
            'Physique',
            'Géography',
            'Histoire',
            'Sciences Politiques',
            'Philosophie',
            'Psychologie',
            'Sciences sociale',
            'Arts Visuels',
            'Musique',
            'Littérature et communication',
            'Langues',
            'Comité de concertation de la formation générale',
            "Techniques d'hygiène dentaire",
            'Techniques de diététique',
            'Techniques de soins infirmiers',
            "Technologie de l'architecture",
            'Technologie du génie civil',
            "Technologie de la mécanique du bâtiment",
            'Techniques de génie mécanique',
            'Technologie de la mécanique industrielle',
            'Technologie du génie électrique',
            'Technologie du génie métallurgique',
            'Techniques policières',
            "Techniques d'éducation à l'enfance",
            'Techniques de travail social',
            'Techniques de la documentation',
            'Techniques administratives',
            "Techniques de l'informatique",
            "Techniques de design d'intérieur"
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            if(empty($_POST['eventName'])){
                $eventNameErreur = "Le nom de l'Évenement ne peut pas etre vide";
                $erreur = true;
            }
            else{
                $eventName = trojan($_POST['eventName']);
            }

            if(DateTime::createFromFormat($dateFormat, $_POST['dateTime']) !== false){
                $dateTimeErreur = "Il y a une erreur avec la date et le temps! Ne pas changer le type d'input.";
                $erreur = true;
            }
            if(empty($_POST['dateTime'])){
                $dateTimeErreur = "Choisi une date et une heure";
                $erreur = true;
            }
            else{
                $dateTime = trojan($_POST['dateTime']);
            }

            if(empty($_POST['lieu']))
            {
                $lieuErreur = "Il faut donner un lieu";
                $erreur = true;
            }
            else{
                $lieu = trojan($_POST['lieu']);
            }

            if (empty($_POST['departement'])) {
                $departementErreur = "Il faut choisir un departement";
                $erreur = true;
            }
            if (!in_array($_POST['departement'], $departementListe)) {
                $departementErreur = "Departement non n'existe pas";
                $erreur = true;
            }
            else
            {
                $departement = trojan($_POST['departement']);
            }
            if($erreur == false){

                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $servername = "localhost";
                    $username   = "root";
                    $password   = "root";
                    $db = "happyornot";

                    $conn = new mysqli($servername, $username, $password, $db);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "INSERT INTO evenement (nom, moment, lieu, departement) VALUES ('$eventName','$dateTime','$lieu','$departement')";

                    if (mysqli_query($conn, $sql)) {
                        echo "Evenement Engregistrer";
                        ?>
                        <a href="./accueil.php"><button type="button" class="btn btn-dark">Back</button></a>
                        <a href="./creationEvenement.php"><button type="button" class="btn btn-dark">Nouveau evenment</button></a>
                        <?php
                        //DATA SAVED
                    }
                    else{
                        echo "FATAL ERROR SQL";
                        //DATA ERROR
                    }

                    mysqli_close($conn);

                }

            }

        }
        if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == true){
    ?>  
    <a href="./accueil.php"><button type="button" class="btn btn-dark">Back</button></a>
    <div id="container">
        <h1>Creation Evenement</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p>Nom Événement:</p><input type="text" name="eventName" id="eventName" class="inputfield">
            <p>Date et temps:</p><input type="datetime-local" name="dateTime" id="dateTime" class="inputfield">
            <p>Lieu:         </p><input type="text" name="lieu" id="lieu" class="inputfield">
            <p>Departement:  </p>
            <select name="departement" id="departement" class="inputfield">
                <option value="Biologie">Biologie</option>
                <option value="Éducation Physique">Éducation Physique</option>
                <option value="Mathématiques">Mathématiques</option>
                <option value="Chimie">Chimie</option>
                <option value="Physique">Physique</option>
                <option value="Géography">Géography</option>
                <option value="Histoire">Histoire</option>
                <option value="Sciences Politiques">Sciences Politiques</option>
                <option value="Philosophie">Philosophie</option>
                <option value="Psychologie">Psychologie</option>
                <option value="Sciences sociale">Sciences sociale</option>
                <option value="Arts Visuels">Arts Visuels</option>
                <option value="Musique">Musique</option>
                <option value="Littérature et communication">Littérature et Communication</option>
                <option value="Langues">Langues</option>
                <option value="Comité de concertation de la formation générale">Comité de concertation de la formation générale</option>
                <option value="Techniques d'hygiène dentaire">Techniques d'hygiène dentaire</option>
                <option value="Techniques de diététique">Techniques de diététique</option>
                <option value="Techniques de soins infirmiers">Techniques de soins infirmiers</option>
                <option value="Technologie de l'architecture">Technologie de l'architecture</option>
                <option value="Technologie du génie civil">Technologie du génie civil</option>
                <option value="Technologie de la mécanique du bâtiment"> Technologie de la mécanique du bâtiment</option>
                <option value="Techniques de génie mécanique">Techniques de génie mécanique</option>
                <option value="Technologie de la mécanique industrielle">Technologie de la mécanique industrielle</option>
                <option value="Technologie du génie électrique">Technologie du génie électrique</option>
                <option value="Technologie du génie métallurgique">Technologie du génie métallurgique</option>
                <option value="Techniques policières">Techniques policières</option>
                <option value="Techniques d'éducation à l'enfance">Techniques d'éducation à l'enfance</option>
                <option value="Techniques de travail social">Techniques de travail social</option>
                <option value="Techniques de la documentation">Techniques de la documentation</option>
                <option value="Techniques administratives">Techniques administratives</option>
                <option value="Techniques de l'informatique"> Techniques de l'informatique</option>
                <option value="Techniques de design d'intérieur">Techniques de design d'intérieur</option>
            </select>
            <input type="submit" id="submit">
            <br>
            <p><?php echo $eventNameErreur;?></p>
            <p><?php echo $dateTimeErreur;?></p>
            <p><?php echo $lieuErreur;?></p>
            <p><?php echo $departementErreur;?></p>

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