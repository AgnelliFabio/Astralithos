<?php

if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

} else {
    header("Location: index.php");
    exit();
}
?>


<?php 
    include_once('connect.php'); 
	?>
<html>
	<head>
	<title>Formulaire de destruction</title>
    <link rel="stylesheet" href="style/style.css">
	</head>

	<body>


    <div class="wrapper">
    <div class="card-switch">
        <input type="checkbox" class="toggle">
        <div class="flip-card__inner">
            <div class="flip-card__front">
                <div class="title">Supprimer utilisateur</div>
                <form class="flip-card__form" action="" method="post">
                <input type="hidden" name="filtre" value="delete-user">
                    <input class="flip-card__input" name="utilisateur" placeholder="Supprimer utilisateur" type="email" required>

                    <button class="flip-card__btn" type="submit" name="submit">Suprimer</button>

                    <?php   if (isset($_POST['utilisateur']))
    { 
		$userid=htmlspecialchars($_POST['utilisateur']);
		// verifier que l'utilisateur existe.
		if (existeUserid($userid))
		{
            echo 'Utilisateur : '.$userid.' existe bien';
			echo '<div class="title">Pour supprimer écriver oui </div><input class="flip-card__input" name="verifDelete" placeholder="entré oui" type="text" required><button class="flip-card__btn" type="submit" name="submit">Suprimer</button>';
            
            if (isset($_POST['verifDelete'])) {

                if ($_POST['verifDelete'] == 'oui'){
                deleteUserid($userid);
                echo "destruction de l'utilisateur ".$userid." <br/>";
                }
                else{
                    echo'destruction non validé';
                }
            } else {

            }
            
		}
		else
			echo "cet utilisateur n'existe pas <br/>";
	}?>
                </form>
                </div>
        </div>
    </div>
</div>

<?php

//Fonction qui retourne si le userid $pseudo est present (true) ou non dans la table utilisateurs (false)
function existeUserid($pseudo)
{
    global $servername,$username,$pwdBDD,$dbname;
    $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
$requete = "SELECT COUNT(*) as nbUserid FROM form where email =?";
$statement =mysqli_prepare($conn, $requete)  or die(mysqli_error($conn));
mysqli_stmt_bind_param($statement,"s",$pseudo) or die(mysqli_error($conn));
mysqli_execute($statement)  or die(mysqli_error($conn));

$resultat=mysqli_stmt_get_result($statement);
$row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
//print_r($row);
mysqli_close($conn) or die(mysqli_error($conn));

$nb=$row['nbUserid'];
return $nb==1;
}



function deleteUserid($pseudo)
{
    global $servername,$username,$pwdBDD,$dbname;
    $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
$requete = "DELETE FROM form where email =?";
$statement =mysqli_prepare($conn, $requete)  or die(mysqli_error($conn));
mysqli_stmt_bind_param($statement,"s",$pseudo) or die(mysqli_error($conn));
mysqli_execute($statement)  or die(mysqli_error($conn));
}


?>
</body>
</html>