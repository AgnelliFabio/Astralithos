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
     session_start(); 
    include_once('header.php');
    include_once('connect.php'); 
     ?>
    <div class="wrapper">
        <div class="card-switch">
            <input type="checkbox" class="toggle">
            <div class="flip-card__inner">
                <div class="flip-card__front">
                    <div class="title">Oublie mots de passe</div>
                    <form class="flip-card__form" action="" method="post">
                        <input class="flip-card__input" name="mail-r" placeholder="Mail" type="email">
                        <select class="flip-card__select" name="security-question" required>
                            <option value="" disabled selected>Question secrète</option>
                            <option value="1">Quel est le nom de votre premier animal de compagnie ?</option>
                            <option value="2">Quel est le nom de votre ville natale ?</option>
                            <option value="3">Quel est le nom de votre professeur préféré ?</option>
                            <option value="4">Quel est le nom de votre film préféré ?</option>
                        </select>
                        <input class="flip-card__input" name="security-answer" placeholder="Réponse à la question secrète" type="text" required>
                        <input class="flip-card__input" name="new" placeholder="Modifier mot de passe" type="password" required>
                        <input class="flip-card__input" name="verifnew" placeholder="Modifier mot de passe" type="password" required>
                        <button class="flip-card__btn" style="color:#4F505E;" type="submit" name="submit">Modifier</button>

                        <?php  
        global $servername,$username,$pwdBDD,$dbname;
        $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));

    if (isset($_POST['submit'])) {
        // Récupérer la valeur du login depuis l'URL
        $email = htmlspecialchars($_POST['mail-r']);
        $answer = htmlspecialchars($_POST['security-answer']);
        $rep = htmlspecialchars($_POST['security-question']);

        // ... la suite de votre code ..
        $requete = "SELECT numQuest, reponse FROM form WHERE email = ?";
        $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
        mysqli_stmt_bind_param($statement, "s", $email) or die(mysqli_error($conn));
        mysqli_execute($statement) or die(mysqli_error($conn));
        $resultat = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
        mysqli_stmt_close($statement);
        mysqli_close($conn);

        if ($row) {
            $numQuest = $row['numQuest'];
            $reponse = $row['reponse'];
            // Utilisez les valeurs récupérées comme vous le souhaitez
        } else {
            echo "Aucun enregistrement trouvé.";
        }

        if ($_POST['new'] === $_POST['verifnew']) {
            $newPass = htmlspecialchars ($_POST['new']);
            $newPassCod = md5($newPass . '$x21**');
            
        } else {
            echo '<p style="color: white;">Vérification du mot de passe incorrect</p>';
            // Ajoutez ici une logique supplémentaire si nécessaire, comme une redirection vers une autre page ou l'affichage d'un message d'erreur.
            exit; // Arrête l'exécution du script après l'affichage du message d'erreur.
        }

        
        if (($answer == $reponse) && ($rep == $numQuest)) {

            if (isset($_POST['submit'])) {

                global $servername,$username,$pwdBDD,$dbname;
                $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
                $requete = "UPDATE form SET password = ? WHERE email = ?";
                $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
                mysqli_stmt_bind_param($statement, "ss", $newPassCod, $email) or die(mysqli_error($conn));
                mysqli_execute($statement) or die(mysqli_error($conn));


            }

        }
        else{
            echo'Vous vous êtes trompé(e) de question ou de réponse';
        }
            }
    ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br> <br><br><br><br><br>
    <?php 
	include_once('footer.php'); 
	?>
</body>
</html>

<?php

			