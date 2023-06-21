<?php
session_start();

if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

} else {
    header("Location: index.php");
    exit();
}
?>

<?php 
	include_once('header.php'); 
    include_once('connect.php'); 
	?>
    
<!DOCTYPE html>
<html>
<head>
    <title>Cesium Map</title>

    <style>
body {
            font-family: poppins;
            background-image: url("assets/img/fond-etoile-form.jpg");
            background-size: cover;
        }

        .btn-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-earth {
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

    .btn-earth img {
        margin-right: 3px;
        transform: rotate(0deg);
        transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
    }

    .btn-earth span {
        transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
    }

    .btn-earth:hover img {
        transform: translateX(5px) rotate(90deg);
    }

    .btn-earth:hover span {
        transform: translateX(7px);
    }



</style>
    
</head>
<body>
<br>
<form method="post" action="">
    <div class="btn-container">
        <button name="btn-1" class="btn-earth">
        <img src="assets/img/plus.png" alt="Votre Image" width="24" height="24">

            <span>Ajout admin</span>
        </button>

        <button name="btn-2" class="btn-earth">
        <img src="assets/img/moins.png" alt="Votre Image" width="24" height="24">
            <span>Supression utilisateur</span>
        </button>

        <button name="btn-3" class="btn-earth">
        <img src="assets/img/cyclone.png" alt="Votre Image" width="24" height="24">
            <span>Tornade</span>
        </button>

        <button name="btn-4" class="btn-earth">
        <img src="assets/img/tsunami.png" alt="Votre Image" width="24" height="24">
            <span>Tsunami</span>
        </button>

        <button name="btn-5" class="btn-earth">
        <img src="assets/img/volcan-icon.png" alt="Votre Image" width="24" height="24">
            <span>Volcan</span>
        </button>

    </div>
</form>


<?php 

if (isset($_POST ['filtre'])){
    if (($_POST['filtre']) == 'ajout-admin') {
        include_once('ajout-admin.php'); 
    }
}
if (isset($_POST['btn-1'])) {
    include_once('ajout-admin.php'); 

}

if (isset($_POST['btn-2'])) {
    include_once('earth-2.php'); 
}

if (isset($_POST['btn-3'])) {
    include_once('earth-3.php'); 
}

if (isset($_POST['btn-4'])) {
    include_once('earth-4.php'); 
}

if (isset($_POST['btn-5'])) {
    include_once('earth-5.php'); 
}
?>


<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>

<?php
include_once('footer.php');
?>


</body>
</html>
