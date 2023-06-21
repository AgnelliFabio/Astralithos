<?php
session_start();

if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

} else {
    header("Location: index.php");
    exit();
}
?>

<?php 
    include_once('connect.php'); 
	?>

<!DOCTYPE html>
<html lang="efr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astralithos - Admin</title>
    <link rel="stylesheet" href="style/style.css">

    <style>
        body {
            font-family: poppins;
            background-image: url("assets/img/fond-etoile-form.jpg");
            background-size: cover;
        }
    </style>

</head>
<body>

<div class="wrapper">
    <div class="card-switch">
        <input type="checkbox" class="toggle">
        <div class="flip-card__inner">
            <div class="flip-card__front">
                <div class="title">Ajout admin</div>
                <form class="flip-card__form" action="" method="post">
                <input type="hidden" name="filtre" value="ajout-admin">
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
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);

    if ($_POST['pass'] === $_POST['verif']) {
        $password = htmlspecialchars($_POST['pass']);
    } else {
        echo '<p style="color: white;">Vérification du mot de passe incorrect</p>';
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
        echo '<p style="color: white;">Le mail '.$nom.' est déjà utilisé</p>';
        exit;
    }

    $admin = 'admin';

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
                </div>
            </div>
        </div>
    </div>
</body>
</html>