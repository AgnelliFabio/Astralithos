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
                        echo "<tr>";
                        echo "<td>";
                        echo($row['nom']);
                        echo "</td>";
                        echo "<td>";
                        echo($row['email']);
                        echo "</td>";
                        echo "<td>";
                        echo($row['admin']);
                        echo "</td>";
                        echo "<td>";
                        echo($row['password']);
                        echo "</td>";
                        echo "<td>";
                        echo($row['numQuest']);
                        echo "</td>";
                        echo "<td>";
                        echo($row['reponse']);
                        echo "</td>";
                        echo "</tr>";
                      }


                      if (isset($_POST['utilisateur'])){
                      $modif = htmlspecialchars($_POST['utilisateur']);
                    }else{
                        echo 'renseigné utilisateur';
                    }


                      global $servername,$username,$pwdBDD,$dbname;
                      $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
                      $requete = 'SELECT * FROM form WHERE email = ?';
                      $statement =mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
                      mysqli_stmt_bind_param($statement, "s", $modif) or die(mysqli_error($conn));
                      mysqli_execute($statement) or die(mysqli_error($conn));
                      $resultat=mysqli_stmt_get_result($statement);
                      
                      
                      if (isset($_POST['utilisateur'])) {
                          $userid = htmlspecialchars($_POST['utilisateur']);
                          
                          // Vérifier si l'utilisateur existe
                          if (existeUserid($userid)) {
                              echo 'Utilisateur : ' . $userid . ' existe bien';
                              
                              echo '<div class="center-table">
                                      <table>
                                          <thead>
                                              <tr>
                                                  <th>Pseudo</th>
                                                  <th>Email</th>
                                                  <th>Statut</th>
                                                  <th>Password</th>
                                                  <th>Num Question</th>
                                                  <th>Reponse</th>
                                              </tr>
                                          </thead>';
                      
                              while ($row = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
                                  affichRow($row);

                                  ?>
                                  <input type="hidden" name="filtre" value="modif-user">
                                  <input class="flip-card__input" name="utilisateur" placeholder="pizza" type="texte" required>
              
                                  <button class="flip-card__btn" type="submit" name="submit">Recherche</button>
                                  <?php

                                  if (isset($_POST['submit'])) {

                                    global $servername,$username,$pwdBDD,$dbname;
                                    $conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
                                    $requete = "UPDATE form SET password = ? WHERE email = ?";
                                    $statement = mysqli_prepare($conn, $requete) or die(mysqli_error($conn));
                                    mysqli_stmt_bind_param($statement, "ss", $newPassCod, $email) or die(mysqli_error($conn));
                                    mysqli_execute($statement) or die(mysqli_error($conn));
                    
                    
                                }
                              }
                              
                              echo '</table>
                                    </div>';
                          }
                      }
                      ?>
                      


                </form>
                </div>
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



                        
?>
</body>
</html>