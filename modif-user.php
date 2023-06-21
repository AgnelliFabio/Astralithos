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

    <style>
                         table {
                             width: 100%;
                             border-collapse: collapse;
                           }
                           
                           th, td {
                             padding: 10px;
                             text-align: left;
                             border-bottom: 1px solid #ddd;
                             color: white; /* Nouvelle ligne ajoutée */
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

<div class="glob-modif">
    <div class="wrapper">
    <div class="card-switch">
        <input type="checkbox" class="toggle">
        <div class="flip-card__inner" id="glob-modif">
            <div class="flip-card__front">
                <div class="title">Modifier donné utilisateur</div>
                <form class="flip-card__form" action="" method="post">
                <input type="hidden" name="filtre" value="modif-user">
                    <input class="flip-card__input" name="utilisateur" placeholder="chercher un utilisateur" type="email" required>

                    <button class="flip-card__btn" type="submit" name="submit">Recherche</button>

                    <?php  
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


                      if (isset($_POST['utilisateur'])){
                      $modif = htmlspecialchars($_POST['utilisateur']);
                    }else{

                    }


                      global $servername,$username,$pwdBDD,$dbname;
                      $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
                      $requete = 'SELECT * FROM form WHERE email = ?';
                      $statement =mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
                      mysqli_stmt_bind_param($statement, "s", $modif) or die(mysqli_error($conn));
                      mysqli_execute($statement) or die(mysqli_error($conn));
                      $resultat=mysqli_stmt_get_result($statement);
                      ?>
                      
                      <?php

//Fonction qui retourne si le userid $pseudo est present (true) ou non dans la table utilisateurs (false)
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

?> </form> <?php
if (isset($modif)){
    if (existeEmail($modif)) {

        echo 'Utilisateur : ' . $modif . ' existe bien';
                              
        echo '<div class="center-table">
                <table>
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>email</th>
                            <th>statut</th>
                            <th>Code chiffré</th>
                            <th>Num Quest</th>
                            <th>Rep Quest</th>
                        </tr>
                    </thead>';

        while ($row = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
            affichRow($row);
        }
        
        echo '</table>
              </div>';
        
              include_once('modif-user-from.php'); 
        exit;
    }else{
        echo '<p style="color: black;">Le mail '.$modif.' est pas utilisateur</p>';
    
    
    }
}


                        
?>


                </form>
                </div>
        </div>
    </div>
</div>
                    </div>

</body>
</html>