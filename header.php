<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title> 

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
    width: 140px;
    height: 60px;
    margin-left: 10px; /* Ajout de la marge à gauche */
  }

  nav ul {
    list-style: none;
    display: flex;
    gap: 10px;
    margin-right: 10px;
  }

  nav ul li {
    margin-right: 10px;
  }

  nav ul li a {
    color: #fff;
    text-decoration: none;
  }

  .profile-icon a {
    display: flex;
    align-items: center;
    color: #fff;
    text-decoration: none;
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


  <div class="logo-header">
    <img src="assets/img/logo-Astralithos-rectangle.png" alt="Logo">
  </div>
  <nav>
    <ul>
      <li><a href="#">Recherche</a></li>
      <li><a href="#">Découverte</a></li>
      <li><a href="#">Terre</a></li>
      <li><a href="form.php"><img src="assets/img/picto-compte.png" style="width: 30px;
    height: 30px; align-items: center;"></a></li>
    </ul>
  </nav>
</header>

</body>
</html>
