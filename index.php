<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="style/style-home.css">
       
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
    .parallax-one {
    background: url('assets/img/fondparallax.jpg') fixed 50%;
    background-size: cover;
    } /*parallax section 1*/ 
    
    .parallax-two {
    background: url('assets/img/fondparallax.jpg') fixed 50%;
    background-size: cover;
    } 
    </style> 

</head>

<body>

<section class="section1">
        <div class="promo parallax-one pad">
          <div class="container">
          <div class="space-header"></div>
          <?php include_once('header.php'); ?>

          <div class="promo parallax-one pad">
            <div class="container">
              <div class="content-wrapper">
                <img src="assets/img/earth.gif" alt="Terre en rotation" class="earth">
                  <div class="text-wrapper">
        
            <div class="accroche">Phrase d'accroche / Citation</div>
          <div class="text-home">Chaque année, des centaines de catastrophes naturelles se produisent, ayant plus ou moins d'impact sur notre vie. Bien que l'humain ait réussi à se développer, la nature reste celle qui choisit.</div>
        </div>
      </div>
    </div>
  </div>
</section>

  <section class="flex-container Apropos">
    <div class="but">BUT DU SITE</div>
    <div class="text-but">“Nom du site” est un site qui répertorie toutes les catastrophes naturelles <br> que la Terre a subi ces XX dernières années. Histoire et à propos...</div>
    <br>
    <br>
    <br>
    <br>
  

  <div class="icon-container">
    <div class="icon"><img src="assets/img/flood-icon.png"></div>
    <div class="icon"><img src="assets/img/tsunami-icon.png"></div>
    <div class="icon"><img src="assets/img/tornado-icon.png"></div>
  </div>

  <div class="icon-container2">
    <div class="icon"><img src="assets/img/meteor-icon.png"></div>
    <div class="icon"><img src="assets/img/earthquake-icon.png"></div>
  </div>

  </section>


  <section class="section1">
        <div class="promo parallax-two pad2">
          <div class="container">

          <div class="promo parallax-two pad2">
            <div class="container">
              <div class="text-wrapper2">
                <div class="tilteearth">TERRE</div>
                  <div class="content-wrapper2">
                    <img src="assets/img/earth.gif" alt="Terre en rotation" class="earth2">
                      <div class="text-connect">Connectez-vous pour accéder à la section "Terre"</div>
                        <button class="favorite styled" type="button">Connexion</button>
                        
      </div>
    </div>
  </div>
</section>


  
<?php include_once('footer.php'); ?>
 
  
</body>
</html>