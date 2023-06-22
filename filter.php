<?php
  session_start();
?>
<html>
<head>
  <title>Changement de contenu</title>
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <style>
        body {
            font-family: poppins;
            background-image: url("assets/img/fond-etoile-form.jpg");
            background-size: cover;
            color:white;
        }

    </style>
</head>
<body>
  <?php 
	  include_once('header.php'); 
    include_once('connect.php'); 
    $type='temporaire';
    if (!(isset($minFrom))){
      $minFrom = 99;
      $minTo = 99;
    }
	?>
  <style>
      .container-list {       
        display: flex;
        flex-direction: row; /* Ajout de la propriété flex-direction avec la valeur row */
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
      } 
      .btn-form {
        display: flex;
        align-items: center;
        font-family: inherit;
        font-weight: 500;
        font-size: 17px;
        padding: 0.8em 1.3em 0.8em 0.9em;
        color: white;
        background: #ad5389;
        background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
        border: none;
        letter-spacing: 0.05em;
        border-radius: 16px;
      }
      .btn-form img {
        margin-right: 3px;
        transform: rotate(0deg);
        transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
        }

        .btn-form span {
            transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
        }

        .btn-form:hover img {
            transform: translateX(5px) rotate(90deg);
        }

        .btn-form:hover span {
            transform: translateX(7px);
        }
  </style>  
  <form method="post" action="">
    <div class="container-list"> 

    <button class="btn-form" name="btn-1">
    <img src="assets/img/tremblement.png" alt="Votre Image" width="24" height="24"> <span>Tremblement</span>
    </button>
    <button class="btn-form" name="btn-2">
    <img src="assets/img/meteorite.png" alt="Votre Image" width="24" height="24"> <span>Météore</span>
    </button>
    <button class="btn-form" name="btn-3">
    <img src="assets/img/cyclone.png" alt="Votre Image" width="24" height="24"> <span>Tornade</span>
    </button>
    <button class="btn-form" name="btn-4">
    <img src="assets/img/tsunami.png" alt="Votre Image" width="24" height="24"> <span>Tsunami</span>
    </button>
    <button class="btn-form" name="btn-5">
    <img src="assets/img/volcan-icon.png" alt="Votre Image" width="24" height="24"> <span>Volcan</span>
    </button> 
    </div>
  </form>
 
  <div id="content">
    <p>Contenu initial.</p>
  </div>
  
  <?php
    if (isset($_POST['btn-1'])) {
        include_once('filter-tremblement.php'); 
        $type='tremblement';
    }
    
    if (isset($_POST['btn-2'])) {
        $minFrom = 2;
        $minTo = 2;

        include_once('tmp.php'); 
        $type='meteore';
    }
    
    if (isset($_POST['btn-3'])) {
        include_once('tmp.php'); 
        $type='tornade';
    }
    if (isset($_POST['btn-4'])) {
      include_once('tmp.php'); 
      $type='tsunami';
    }
  
    if (isset($_POST['btn-5'])) {
      include_once('tmp.php'); 
      $type='volcan';
    }
  ?>

  <?php
  if (isset($_POST['filtre'])){
    if($_POST['filtre']=='tremblement'){
    include_once('filter-tremblement.php'); 
    echo 'voici la variable min '.$_POST["minuteFrom"].' et le variable max '.$_POST["minuteTo"];
    echo '<br>';
    $minFrom = $_POST["minuteFrom"] + 4;
    $minTo = $_POST["minuteTo"] + 4;
  }
}
  echo "Vous avez choisi de faire une filtrage sur ".$type." et en variable, on a : ".$minFrom." et ".$minTo ;
  ?>
</body>
</html>