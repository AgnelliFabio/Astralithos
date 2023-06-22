<?php
/*if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

} else {
    header("Location: index.php");
    exit();
}*/

include_once('connect.php');

function affichRow($row)
{
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $email = $row['email'];
    $admin = $row['admin'];
    $password = $row['password'];
    $numQuest = $row['numQuest'];
    $reponse = $row['reponse'];

    echo "<tr>";
    echo "<td>";
    echo $nom;
    echo "</td>";
    echo "<td>";
    echo $prenom;
    echo "</td>";
    echo "<td>";
    echo $email;
    echo "</td>";
    echo "<td>";
    echo $admin;
    echo "</td>";
    echo "<td>";
    echo $password;
    echo "</td>";
    echo "<td>";
    echo $numQuest;
    echo "</td>";
    echo "<td>";
    echo $reponse;
    echo "</td>";
    echo "</tr>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mailChoisi = $_POST['email'];

    // Connexion à la base de données
    global $servername, $username, $pwdBDD, $dbname;
    $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));

    // Vérification de la connexion
    if (mysqli_connect_errno()) {
        die("Erreur de connexion à la base de données : " . mysqli_connect_error());
    }

    $requete = 'SELECT * FROM form WHERE email = ?';
    $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($statement, "s", $mailChoisi) or die(mysqli_error($conn));
    mysqli_execute($statement) or die(mysqli_error($conn));
    $resultat = mysqli_stmt_get_result($statement);

    while ($row = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
        $nomBDD = $row['nom'];
        $prenomBDD = $row['prenom'];
        $emailBDD = $row['email'];
        $adminBDD = $row['admin'];
        $numQuestBDD = $row['numQuest'];
        $reponseBDD = $row['reponse'];
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire avec liste d'emails</title>
</head>
<link rel="stylesheet" href="style/style.css">
<body>
<div class="wrapper">
    <div class="card-switch">
        <input type="checkbox" class="toggle">
        <div class="flip-card__inner">
            <div class="flip-card__front">
                <div class="title">Modification données Utilisateur</div>
                <form class="flip-card__form" method="post">
                <input type="hidden" name="filtre" value="modif-user">
                    <label for="email">Sélectionnez un compte :</label>
                    <select name="email" id="email">
                        <?php
                        // Connexion à la base de données
                        global $servername, $username, $pwdBDD, $dbname;
                        $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));

                        // Vérification de la connexion
                        if (mysqli_connect_errno()) {
                            die("Erreur de connexion à la base de données : " . mysqli_connect_error());
                        }

                        // Récupération des emails depuis la base de données
                        $requete = "SELECT email FROM form";
                        $resultat = mysqli_query($conn, $requete);

                        if (mysqli_num_rows($resultat) > 0) {
                            while ($row = mysqli_fetch_assoc($resultat)) {
                                $email = $row["email"];
                                echo '<option value="' . $email . '">' . $email . '</option>';
                            }
                        } else {
                            echo '<option value="">Aucun email trouvé</option>';
                        }

                        // Fermeture de la connexion à la base de données
                        mysqli_close($conn);
                        ?>
                    </select>
                    <br>
                    <input class="flip-card__btn" type="submit" value="Soumettre">
                    <?php
                    if (isset($mailChoisi)) {
                        ?>
                        <input type="hidden" name="filtre" value="modif-user">
                        <input class="flip-card__input" placeholder="Nom" type="text" name="nom"
                               value="<?php echo $nomBDD; ?>" required>
                        <input class="flip-card__input" placeholder="Prénom" type="text" name="prenom"
                               value="<?php echo $prenomBDD; ?>" required>
                        <input class="flip-card__input" name="email" placeholder="Mail" type="email"
                               value="<?php echo $mailChoisi; ?>" required>
                        <input class="flip-card__input" name="pass" placeholder="Mot de passe" type="password" required>
                        <input class="flip-card__input" name="verif" placeholder="Confirmation" type="password" required>
                        <input class="flip-card__input" name="num-quest" placeholder="Num Question" type="text"
                               value="<?php echo $numQuestBDD; ?>" required>
                        <input class="flip-card__input" name="reponse" placeholder="Réponse à la question secrète"
                               type="text" value="<?php echo $reponseBDD; ?>" required>
                        <input class="flip-card__input" name="statut" placeholder="Statut"
                               type="text" value="<?php echo $adminBDD ; ?>" required>

                        <button class="flip-card__btn" type="submit" name="submit-modif">Confirmer</button>
                        <?php
                    }

                    if (isset($_POST['submit-modif'])) {
          
                        $nom = htmlspecialchars($_POST['nom']);
                        $prenom = htmlspecialchars($_POST['prenom']);
                        $email = htmlspecialchars($_POST['email']);
                        $numQuest = htmlspecialchars($_POST['num-quest']);
                        $reponse = htmlspecialchars($_POST['reponse']);
                        $admin = htmlspecialchars($_POST['statut']);
            
            
            
                        if ($_POST['pass'] === $_POST['verif']) {
                            $password = htmlspecialchars($_POST['pass']);
                        } else {
                            echo '<script> alert("Vérification du mots de passe incorect");</script>';
                        }
                        
            

            
                        $passEncode = md5($password . '$x21**');
            
                        // Connexion à la base de données
                        global $servername,$username,$pwdBDD,$dbname;
                        $conn = mysqli_connect($servername, $username,$pwdBDD, $dbname) or die(mysqli_error($conn));
            
                        // Requête d'insertion des données
                        $requete = 'UPDATE form SET nom=?, prenom=?, email=?, password=?, numQuest=?, reponse=?, admin=? WHERE email=?';

                        $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
                        mysqli_stmt_bind_param($statement,"ssssssss",$nom,$prenom,$email,$passEncode,$numQuest,$reponse,$admin,$mailChoisi) or die(mysqli_error($conn));
                        mysqli_execute($statement) or die(mysqli_error($conn));
                        echo '<script>
                        setTimeout(function() {
                            alert("Utilisateur '.$email.'bien modifier");
                        }, 500);
                    </script>';
            
                        mysqli_close($conn) or die(mysqli_error($conn));
                    }else{
                    }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
