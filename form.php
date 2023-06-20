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
        }
    </style>
</head>
<body>
    <?php 
	include_once('header.php'); 
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
        // Vérifier si le formulaire a été soumis
        if (isset($_POST['submit'])) {
            // Récupération des valeurs du formulaire
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);



			if ($_POST['pass'] === $_POST['verif']) {
				$password = htmlspecialchars($_POST['pass']);
			} else {
				echo '<p style="color: white;">Vérification du mot de passe incorrect</p>';
				// Ajoutez ici une logique supplémentaire si nécessaire, comme une redirection vers une autre page ou l'affichage d'un message d'erreur.
				exit; // Arrête l'exécution du script après l'affichage du message d'erreur.
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
						// Gérer le cas où aucune question n'est sélectionnée ou la valeur n'est pas valide.
						// Vous pouvez afficher un message d'erreur ou définir une valeur par défaut pour $numquest.
						break;
				}
			}
			
			function existeEmail($email)
			{
				$conn = mysqli_connect("localhost:8889", "root", "root", "SAE") or die(mysqli_error($conn));
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
			}
			
			// ... le reste du code pour ajouter l'utilisateur dans la base de données
			
			
			$admin= 'base-user';

            $passEncode = md5($password . '$x21**');



            // Connexion à la base de données
            $conn=mysqli_connect("localhost:8889", "root","root","SAE") or die("Connexion non possible! <br/>". mysqli_connect_error());
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
	include_once('footer.php'); 
	?>
    </body>
    </html>












<?php


$conn = mysqli_connect("localhost:8889", "root", "root", "SAE") or die(mysqli_error($conn));


function estAdmin($pseudo)
{
    $conn = mysqli_connect("localhost:8889", "root", "root", "SAE") or die(mysqli_error($conn));
    $requete = "SELECT admin FROM `form` WHERE email = ?";
    $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($statement, "s", $pseudo) or die(mysqli_error($conn));
    mysqli_execute($statement) or die(mysqli_error($conn));

    $resultat = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    mysqli_close($conn) or die(mysqli_error($conn));

    return $row['admin'] == "admin";
}

function loginPassOk($pseudo, $password)
{
    $passEncode = md5($password . '$x21**');

    $conn = mysqli_connect("localhost:8889", "root", "root", "SAE") or die(mysqli_error($conn));
    $requete = "SELECT COUNT(*) as nb FROM form WHERE email = ? AND password = ?";
    $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($statement, "ss", $pseudo, $passEncode) or die(mysqli_error($conn));
    mysqli_execute($statement) or die(mysqli_error($conn));

    $resultat = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    mysqli_close($conn) or die(mysqli_error($conn));

    $nb = $row['nb'];
    return $nb == 1;
}








if (isset($_POST['login']))
{
$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['pwd']);
$passEncodeConect = md5($pass . '$x21**');
if (loginPassOk($login,$pass)){
    echo '<p style="font-size: 24px; color: white;">Vous etes connecter</p>';
}else{
    echo '<p style="font-size: 24px; color: white;">Email ou mot de passe incorrect</p>';
    
}
}



$conn = mysqli_connect("localhost:8889", "root", "root", "SAE") or die(mysqli_error($conn));

// Préparation de la requête
$requete = "SELECT admin FROM form WHERE email = ? AND password = ?";
$statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));

// Liaison des paramètres à la requête préparée
mysqli_stmt_bind_param($statement, "ss", $login,$passEncodeConect ) or die(mysqli_error($conn));

// Exécution de la requête
mysqli_execute($statement) or die(mysqli_error($conn));

// Récupération du résultat de la requête
$resultat = mysqli_stmt_get_result($statement);

// Vérification du résultat
if (mysqli_num_rows($resultat) > 0) {
    // Récupération de la valeur de la colonne "admin"
    $row = mysqli_fetch_assoc($resultat);
    $statut = $row['admin'];
} else {
    // Aucune correspondance trouvée, la variable $statut aura une valeur par défaut
    $statut = "";
}


mysqli_close($conn) or die(mysqli_error($conn));

// Utilisation de la variable $statut dans votre code
// ...




if ($statut === 'admin'){
    $_SESSION['admin'] = true;
    echo 'ca marche la vie de ma mere';
    echo '<meta http-equiv="refresh" content="2;admin.php">';
}else{
    $_SESSION['user'] = true;
    
}




?>

</body>
</html>