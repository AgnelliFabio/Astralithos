<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Astralithos</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo-Astralithos-sans-fond.png">

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
    include_once('connect.php'); 
	?>

    <section class="fond-etoiles-form">
        <div class="wrapper">
            <div class="card-switch">
                <label class="switch">
                    <input type="checkbox" class="toggle">
                    <span class="slider"></span>
                    <span class="card-side"></span>
                    <div class="flip-card__inner">
                        <div class="flip-card__front">
                            <div class="title">Connexion</div>
                            <form class="flip-card__form" action="" method="post">
                                <input class="flip-card__input" name="login" placeholder="Mail" type="email">
                                <input class="flip-card__input" name="pwd" placeholder="Password" type="password">
                                <button class="flip-card__btn" style="color:#4F505E;" type="submit" name="submit-connect">Confirmer</button>
                            </form>

                            <a href="oublie-password.php">Mot de passe oublié ?</a>
                        </div>
                        <div class="flip-card__back">
                            <div class="title">Créer un compte</div>
                            <form class="flip-card__form" action="" method="post">
                                <input class="flip-card__input" placeholder="Nom" type="text" name="nom" required>
                                <input class="flip-card__input" placeholder="Prénom" type="text" name="prenom" required>
                                <input class="flip-card__input" name="email" placeholder="Mail" type="email" required>
                                <input class="flip-card__input" name="pass" placeholder="Mot de passe" type="password" required>
                                <input class="flip-card__input" name="verif" placeholder="Vérification" type="password" required>
                                
                                <select class="flip-card__select" name="security-question" required>
                                    <option value="" disabled selected>Question secrète</option>
                                    <option value="1">Quel est le nom de votre premier animal de compagnie ?</option>
                                    <option value="2">Quel est le nom de votre ville natale ?</option>
                                    <option value="3">Quel est le nom de votre professeur préféré ?</option>
                                    <option value="4">Quel est le nom de votre film préféré ?</option>
                                </select>
                                
                                <input class="flip-card__input" name="security-answer" placeholder="Réponse à la question secrète" type="text" required>
                                
                                <button class="flip-card__btn" type="submit" name="submit">Confirmer</button>
                            </form>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </section>

    <?php
      
        if (isset($_POST['submit'])) {
          
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);



			if ($_POST['pass'] === $_POST['verif']) {
				$password = htmlspecialchars($_POST['pass']);
			} else {
				echo '<script> alert("Vérification du mots de passe incorect");</script>';
				
				exit; 
			}
			



			if (isset($_POST['security-question'])) {
				$selectedQuestion = $_POST['security-question'];
				$rep = htmlspecialchars($_POST['security-answer']);
			
				switch ($selectedQuestion) {
					case '1':
						$numquest = 1;
						break;
					case '2':
						$numquest = 2;
						break;
					case '3':
						$numquest = 3;
						break;
					case '4':
						$numquest = 4;
						break;
					default:
						break;
				}
			}
			
			function existeEmail($email)
			{
                global $servername,$username,$pwdBDD,$dbname;
				$conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
				$requete = "SELECT email FROM form WHERE email = ?";
				$statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
				mysqli_stmt_bind_param($statement, "s", $email) or die(mysqli_error($conn));
				mysqli_execute($statement) or die(mysqli_error($conn));
				
				mysqli_stmt_store_result($statement);
				$count = mysqli_stmt_num_rows($statement);
				
				mysqli_stmt_close($statement);
				mysqli_close($conn) or die(mysqli_error($conn));
			
				return $count > 0;
			}
			
			if (existeEmail($email)) {
				echo '<p style="color: white;">Le mail '.$nom.' est déja utiliser</p>';
				exit;
			}else{

            }
			
			$admin= 'base-user';

            $passEncode = md5($password . '$x21**');

            // Connexion à la base de données
            global $servername,$username,$pwdBDD,$dbname;
            $conn = mysqli_connect($servername, $username,$pwdBDD, $dbname) or die(mysqli_error($conn));
            echo "Connexion valide.<br/>";

            // Requête d'insertion des données
            $requete = 'INSERT INTO form (nom, prenom, email, password, numQuest, reponse,admin) VALUES (?,?,?,?,?,?,?)';

            $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
            mysqli_stmt_bind_param($statement,"sssssss",$nom,$prenom,$email,$passEncode,$numquest,$rep,$admin) or die(mysqli_error($conn));
            mysqli_execute($statement) or die(mysqli_error($conn));
			echo '<p style="color: white;">Ajout de l\'utilisateur '.$nom.'</p>';

            mysqli_close($conn) or die(mysqli_error($conn));
        }
    ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>












<?php

global $servername,$username,$pwdBDD,$dbname;
$conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));


function estAdmin($pseudo)
{
    global $servername,$username,$pwdBDD,$dbname;
    $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
    $requete = "SELECT admin FROM `form` WHERE email = ?";
    $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($statement, "s", $pseudo) or die(mysqli_error($conn));
    mysqli_execute($statement) or die(mysqli_error($conn));

    $resultat = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    mysqli_close($conn) or die(mysqli_error($conn));

    return $row['admin'] == "admin";
}


function loginPassOk($login, $passEncodeConect)
{
    global $servername, $username, $pwdBDD, $dbname;
    $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));


    $requete = "SELECT COUNT(*) as nb FROM form WHERE email = ? AND password = ?";
    $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($statement, "ss", $login, $passEncodeConect) or die(mysqli_error($conn));
    mysqli_stmt_execute($statement) or die(mysqli_error($conn));

    $resultat = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    mysqli_stmt_close($statement);
    mysqli_close($conn) or die(mysqli_error($conn));

    $nb = $row['nb'];
    return $nb == 1;
}

if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $login = htmlspecialchars($_POST['login']);
    $pwd = htmlspecialchars($_POST['pwd']);

    $passEncodeConect= md5($pwd . '$x21**');

    if (loginPassOk($login, $passEncodeConect)) {
        echo '<p style="font-size: 24px; color: white;">Vous êtes connecté</p>';
    } else {
        echo '<p style="font-size: 24px; color: white;">Email ou mot de passe incorrect</p>';
    }
}




global $servername,$username,$pwdBDD,$dbname;
$conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));

$requete = "SELECT admin FROM form WHERE email = ? AND password = ?";
$statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
mysqli_stmt_bind_param($statement, "ss", $login,$passEncodeConect ) or die(mysqli_error($conn));
mysqli_execute($statement) or die(mysqli_error($conn));
$resultat = mysqli_stmt_get_result($statement);

if (mysqli_num_rows($resultat) > 0) {
    $row = mysqli_fetch_assoc($resultat);
    $statut = $row['admin'];
} else {
    $statut = "";
}


mysqli_close($conn) or die(mysqli_error($conn));

echo $statut;


    if (isset($_POST['submit-connect'])) {

        global $servername,$username,$pwdBDD,$dbname;
                      $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
                      $requete = 'SELECT nom FROM form WHERE email = ?'; 
                      $statement =mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
                      mysqli_stmt_bind_param($statement, "s", $login) or die(mysqli_error($conn));
                      mysqli_execute($statement) or die(mysqli_error($conn));
                      $resultat=mysqli_stmt_get_result($statement);

                      if ($resultat) {
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            $nomID = $row['nom'];
                        }
                    }

    $_SESSION['loginID']= $nomID;
    } else {
    
    }

    if ($statut == 'admin') {
        $_SESSION['admin'] = true;
        echo '<meta http-equiv="refresh" content="2;admin.php">';
    } else {
        
    }
    

    if ($statut == 'base-user') {
        $_SESSION['base-user'] = true;
        echo '<meta http-equiv="refresh" content="2;earth.php">';
    } else {
        
    }







	include_once('footer.php'); 

?>

</body>
</html>