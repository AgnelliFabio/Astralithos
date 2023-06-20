<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">


    <style>
  header {
    background-color: #384967;
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
    margin-left: 10px; /* Ajout de la marge à gauche */
    align-items: center; /* Centrer verticalement les éléments */
  }

  nav ul {
    list-style: none;
    display: flex;
    gap: 10px;
    margin-right: 10px;
    align-items: center; /* Centrer verticalement les éléments */
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

  .profile-icon a {
    display: flex;
    text-decoration: none;
    align-items: center; /* Centrer verticalement les éléments */
  }

  .profile-icon a::before {
    content: "\f007";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 5px;
  }
</style>

</head>
<body>
<header>


  <div class="logo-header"> <a href="index.php">
    <img src="assets/img/logo-Astralithos-sans-fond.png" alt="Logo">
  </div>
  <nav>
    <ul>
      <li><a href="#">Recherche</a></li>
      <li><a href="#">Découverte</a></li>
      <li><a href="#">Terre</a></li>
      <li><a href="form.php"><img src="assets/img/picto-compte-gris.png" style="width: 30px;
    height: 30px; align-items: center;"></a></li>
    </ul>
  </nav>
</header>

</body>
</html>
