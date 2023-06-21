<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* CSS pour le footer */
    footer {
        background-color: #374967;
        color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-content {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }

    .logo {
        width: 80px;
        height: 50px;
        margin-right: 10px;
    }

    .btn-connexion {
        padding: 10px 20px;
        background-color: white;
        color: blue;
        border: none;
        cursor: pointer;
    }

    .footer-bottom {
        text-align: center;
    }


    .Btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: rgb(255, 65, 65);
}

/* plus sign */
.sign {
  width: 100%;
  transition-duration: .3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 17px;
}

.sign svg path {
  fill: white;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: .3s;
}
/* hover effect on button width */
.Btn:hover {
  width: 200px;
  border-radius: 40px;
  transition-duration: .3s;
}

.Btn:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.Btn:hover .text {
  opacity: 1;
  width: 50%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.Btn:active {
  transform: translate(2px ,2px);
}



.BtnCo {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: #309F30;
}


/* hover effect on button width */
.BtnCo:hover {
  width: 200px;
  border-radius: 40px;
  transition-duration: .3s;
}

.BtnCo:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.BtnCo:hover .text {
  opacity: 1;
  width: 50%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.BtnCo:active {
  transform: translate(2px ,2px);
}

.logofooter {
  width: 168px; /* ajustez la largeur selon vos besoins */
  height: 58,5px; /* ajustez la hauteur selon vos besoins */
  margin-left: auto;
  margin-right: auto;
}



    
</style>

</head>
<body>
<footer>


<img src="assets/img/logo-Astralithos-sans-fond.png" class="logofooter">
<br>
<?php
if ((isset($_SESSION['admin']) && $_SESSION['admin'] === true) && (isset ($_SESSION['user'])&& $_SESSION['user'] === true)) {
    echo '<form action="destroy_session.php" method="post">
    <button class="Btn">
      <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
      <div class="text">Déconnexion</div>
    </button>
    </form>';

} else { 
    echo '<form action="form.php" method="post">
    <button class="BtnCo">
      <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
      <div class="text">Connexion</div>
    </button>
    </form>';


}
?>


    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Astralithos. Tous droits réservés.</p>
    </div>




</footer>


</body>
</html>