<?php

if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

} else {
    header("Location: index.php");
    exit();
}
?>


<?php 
    include_once('connect.php'); 

if (isset($_POST['utilisateur'])){
    $modif = htmlspecialchars($_POST['utilisateur']);

    global $servername,$username,$pwdBDD,$dbname;
$conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
$requete = 'SELECT * FROM form WHERE email = ?';
$statement =mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
mysqli_stmt_bind_param($statement, "s", $modif) or die(mysqli_error($conn));
mysqli_execute($statement) or die(mysqli_error($conn));
$resultat=mysqli_stmt_get_result($statement);
while($row = mysqli_fetch_array($resultat, MYSQLI_ASSOC))
{
    //echo($row['pseudo']." ".$row['email']);
    //echo ("<br/>");
   affichRow($row);
}
  }else{
      echo 'renseigné utilisateur';
  }

?>

	?>
<html>
	<head>
	<title>Formulaire de destruction</title>
    <link rel="stylesheet" href="style/style.css">

    <style>
                         table {
                             width: 100%;
                             border-collapse: collapse;
                           }
                           

                           th, td {
                             padding: 10px;
                             text-align: left;
                             border-bottom: 1px solid #ddd;
                             color: black;
                           }
                           
                           thead {
                             background-color: white;
                           }
                           
                           th {
                             font-weight: bold;
                             color: #333;
                             
                           }
                         
                           .center-table{
                             display: flex;
                             justify-content: center;
                             align-items: center;
                             height: 50vh; 
                           }
                           #glob-modif{
                            display: flex;
                             justify-content: center;
                             align-items: center;
                             height: 100vh; 
                             width: 100vh;
                           }
                           
                         </style>

	</head>

	<body>
<?php echo'
<div class="glob-modif">
    <div class="wrapper">
    <div class="card-switch">
        <input type="checkbox" class="toggle">
        <div class="flip-card__inner" id="glob-modif">
            <div class="flip-card__front">
                <div class="title">Modifier des donnée deNahtan</div>
                <form class="flip-card__form" action="" method="post"> 


                <input type="hidden" name="filtre" value="form-modif">
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
                    </div>'?>

</body>
</html>