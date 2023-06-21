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

<html>
	<meta charset="utf-8"/>
	<BODY>
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
  echo "</tr>";
}
global $servername,$username,$pwdBDD,$dbname;
$conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));
echo "Liste des utilisateurs<br/>";
$requete = 'SELECT * FROM form';
$statement =mysqli_prepare($conn, $requete) or die(mysqli_error($conn));

mysqli_execute($statement) or die(mysqli_error($conn));
$resultat=mysqli_stmt_get_result($statement);

?>

<style>
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
  
</style>

<div class="center-table">
<table>
    <thead>
        <tr>
          <th>
            Pseudo
          </th>
          <th>
           Email
          </th>
          <th>
           Statut
          </th>
        </tr>
    </thead>

<?php
while($row = mysqli_fetch_array($resultat, MYSQLI_ASSOC))
{
    //echo($row['pseudo']." ".$row['email']);
    //echo ("<br/>");
   affichRow($row);
}
?>
</table>
</div>
<?php
mysqli_close($conn) or die(mysqli_error($conn));?>

</body>
</html>