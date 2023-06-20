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
        }
    </style>
</head>
<body>
    <?php 
	include_once('header.php'); 
	session_start(); ?>

<div class="wrapper">
            <div class="card-switch">
                    <input type="checkbox" class="toggle">
                    <div class="flip-card__inner">
                        <div class="flip-card__front">
                            <div class="title">Oublie mots de passe</div>
                            <form class="flip-card__form" action="" method="post">
                                <input class="flip-card__input" name="login" placeholder="Mail" type="email">
                                <select class="flip-card__select" name="security-question" required>
                                    <option value="" disabled selected>Question secrète</option>
                                    <option value="1">Quel est le nom de votre premier animal de compagnie ?</option>
                                    <option value="2">Quel est le nom de votre ville natale ?</option>
                                    <option value="3">Quel est le nom de votre professeur préféré ?</option>
                                    <option value="4">Quel est le nom de votre film préféré ?</option>
                                </select>
                                <input class="flip-card__input" name="security-answer" placeholder="Réponse à la question secrète" type="text" required>
                                <button class="flip-card__btn" style="color:#4F505E;" type="submit" name="submit">Modifier</button>
                            </form>





  <?php  $conn = mysqli_connect("localhost:8889", "root", "root", "SAE") or die(mysqli_error($conn));



if (isset($_POST['submit'])) {
    // Récupérer la valeur du login depuis l'URL
    

    // ... la suite de votre code ...


        
        $requete = "SELECT numQuest, reponse FROM form WHERE email = ?";
        $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
        mysqli_stmt_bind_param($statement, "s", $email) or die(mysqli_error($conn));
        mysqli_execute($statement) or die(mysqli_error($conn));
        $resultat = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
        mysqli_close($conn) or die(mysqli_error($conn));
    
        if ($row) {
            $numQuest = $row['numQuest'];
            $reponse = $row['reponse'];
            // Utilisez les valeurs récupérées comme vous le souhaitez
            echo "NumQuest: " . $numQuest . "<br>";
            echo "Reponse: " . $reponse . "<br>";
        } else {
            echo "Aucun enregistrement trouvé.";
        }
    

    }



	?>




    </body>
    </html>