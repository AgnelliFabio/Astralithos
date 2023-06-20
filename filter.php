<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>

    <style>
        body {
            font-family: poppins;
            background-image: url("assets/img/fond-etoile-form.jpg");
            background-size: cover;
            color:white;
        }
    </style>
</head>
<body>
    <?php 
	include_once('header.php'); 
	?>
    <h1>Filtrer les informations sur les catastrophes naturelles</h1>
    <script src="scripts/script.js"></script>
  <form class="formulaireFiltre" action="" method="get">
            <div id="typeSelection">
                <select id="type-select" name="type-select">
                    <option value="1">Météorite</option>
                    <option value="2">Tornade</option>
                    <option value="3">Inondation</option>
                    <option value="4">Tremblement de terre</option>
                    <option value="5">Tsunami</option>
                </select>
            </div>
            <label for="minuteFrom">Entre </label>
            <input type="range" value="0" min="0" max="59" id="minuteFrom" oninput="updateRangeValue('minuteFrom', 'rangeNumberFrom')">
            <input type="number" id="rangeNumberFrom" min="0" name ="minuteFrom" max="59" value="0" oninput="updateNumberValue('rangeNumberFrom', 'minuteFrom')">

            <label for="minuteTo"> minutes et </label> 
            <input type="range" value="1" min="1" max="60" id="minuteTo" oninput="updateRangeValue('minuteTo', 'rangeNumberTo')">
            <input type="number" id="rangeNumberTo" min="1" name ="minuteTo" max="60" value="1" oninput="updateNumberValue('rangeNumberTo', 'minuteTo')">

            <label for="submit"> minutes.</label>
            <button class="boutonFiltre" type="submit" name="submit">Filtrer</button>
  </form>
  <?php
    $teseur = $_GET['type-select'];
    echo $teseur;
    // Récupérez les valeurs de filtrage à partir des variables de session
    $minFrom = isset($_GET['minuteFrom']) ? $_GET['minuteFrom'] : '';
    $minTo = isset($_GET['minuteTo']) ? $_GET['minuteTo'] : '';
    
    // Effectuez une requête SQL pour obtenir les données filtrées à partir de votre base de données
    $conn = mysqli_connect("localhost:8889", "root", "root", "SAE203") or die(mysqli_error($conn));
    $requete = "SELECT * FROM tremblement2 WHERE minute >= ? AND  minute <= ?";
    $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($statement, "ii", $minFrom, $minTo) or die(mysqli_error($conn));
    mysqli_execute($statement) or die(mysqli_error($conn));
    // Récupérez les résultats de la requête
    $resultSet = mysqli_stmt_get_result($statement);

    // Vérifiez s'il y a des résultats
    if (mysqli_num_rows($resultSet) > 0) {
        // Affichez les résultats dans une boucle
        while ($row = mysqli_fetch_assoc($resultSet)) {
            // Affichez les informations de chaque résultat
            echo "ID : " . $row['id'] . "<br>";
            echo "Minute : " . $row['minute'] . "<br>";
            // Ajoutez ici les autres colonnes que vous souhaitez afficher
            echo "<hr>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }


    mysqli_stmt_close($statement);
    mysqli_close($conn) or die(mysqli_error($conn));

   
?>
</body>
</html>