<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astralithos</title> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/img/logo-Astralithos-sans-fond.png">

    <?php $imgPicto='assets/img/picto-compte-gris.png'; ?>

    <?php
        $currentPage = basename($_SERVER['PHP_SELF'], ".php");


        if ($currentPage === "earth") echo "<style>.terre{color:#A17113;}</style>";
        if ($currentPage === "filter") echo "<style>.filter{color:#A17113;}</style>";
        if ($currentPage === "discovery") echo "<style>.discovery{color:#A17113;}</style>";
        if ($currentPage === "admin") echo "<style>.admin{color:#A17113;}</style>";
        if ($currentPage === "form" ) $imgPicto='assets/img/picto-compte.png';
        if ($currentPage === "oublie-password" ) $imgPicto='assets/img/picto-compte.png';
    ?>

    <style>
        header {
            background-color: #222A3C;
            border-radius: 100px;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }

        .logo-header img {
            width: 100%;
            height: 60px;
            margin-left: 10px;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 10px;
            margin-right: 10px;
            align-items: center;
            font-family: 'Poppins', 'sans-serif';
            font-weight: 700;
        }

        nav ul li {
            margin-right: 30px;
        }

        nav ul li a {
    color: #fff;
    text-decoration: none;

}

#main-anim{

  transition: transform 0.5s;
}

#main-anim:hover{
  transform: scale(1.2);
  color:#A17113;
}



        .profile-icon a {
            display: flex;
            text-decoration: none;
            align-items: center;
        }

        .profile-icon a::before {
            content: "\f007";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            margin-right: 5px;
        }

        .header-title {
            color: black;
        }

        .header-title.terre {
            color: red;
        }

        .form-old {
  width: 40px;
  height: 43px;
  align-self: center;
  background-image: url('<?php echo $imgPicto;?>');
  background-size: cover;
  background-position: center;
}





    </style>
</head>
<body>
    <header>
        <div class="logo-header">
            <a href="index.php">
                <img src="assets/img/logo-Astralithos-sans-fond.png" alt="Logo">
            </a>
        </div>
        <nav>
            <ul>
                <div id="main-anim"> <li><a href="filter.php" class="filter">Recherche</a></li> </div>
                <div id="main-anim"> <li><a href="discovery.php" class="discovery" id="main-anim">Découverte</a></li> </div>
                <div id="main-anim"> <li><a href="earth.php" class="terre" id="main-anim">Terre</a></li> </div>
                <?php 
                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                  echo '<div id="main-anim"> <li><a href="admin.php" class="admin" id="main-anim">Admin</a></li> </div>';

                }else{
                
                }
                ?>
                <li>
                    <a href="form.php">
                      <div class="form-old" id="main-anim"></div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

</body>
</html>
