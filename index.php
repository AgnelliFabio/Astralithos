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

    @font-face {
      font-family: 'SphereFez';
      src: url('assets/font/SphereFez-Yz5g4.otf') format('opentype');
    }

    body {
      font-family: 'SphereFez', sans-serif;
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
        
            <div class="accroche">Phrase d'accroche</div>
          <div class="text-home">"Face à la puissance implacable de la nature, l'humanité reste humble devant les caprices du monde naturel. Chaque année, des centaines de catastrophes nous rappellent notre fragilité. Malgré nos avancées, la nature garde toujours le dernier mot, nous invitant à repenser notre place dans l'équilibre délicat de notre planète."</div>
        </div>
      </div>
    </div>
  </div>
</section>

  <section class="flex-container Apropos">
    <div class="but">À PROPOS</div>
    <div class="text-but">"ASTRALITHOS" est bien plus qu'un simple site, c'est une véritable encyclopédie des catastrophes naturelles qui ont marqué notre Terre au cours des dernières décennies. Plongez dans l'histoire fascinante de ces événements dévastateurs et découvrez les récits captivants qui se cachent derrière chaque tragédie. Des ouragans dévastateurs aux séismes destructeurs, en passant par les éruptions volcaniques spectaculaires, "ASTRALITHOS" vous offre un voyage au cœur des forces impressionnantes de la nature. Explorez les récits poignants, les statistiques alarmantes et les leçons précieuses que ces catastrophes nous ont enseignées. Préparez-vous à être émerveillé, ému et éclairé en plongeant dans l'univers captivant d'ASTRALITHOS, où la fascination pour les catastrophes naturelles rencontre la quête de connaissances et la sensibilisation à notre fragile existence sur cette belle planète.</div>
    <br>
    <br>
    <br>
    <br>
  

  <div class="icon-container">
    <a href="#"><div class="icon"><img src="assets/img/volcan.png"></div></a>
    <a href="#"><div class="icon"><img src="assets/img/tsunami-icon.png"></div></a>
    <a href="#"><div class="icon"><img src="assets/img/tornado-icon.png"></div></a>
  </div>

  <div class="icon-container2">
    <a href="#"><div class="icon"><img src="assets/img/meteor-icon.png"></div></a>
    <a href="#"><div class="icon"><img src="assets/img/earthquake-icon.png"></div></a>
  </div>

  <a href="earth.php"> <button class="favorite styled2" type="button">Découvrir</button></a>

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
                      <a href="form.php"> <button class="favorite styled2" type="button">Se connecter</button></a>

                      
                        
      </div>
    </div>
  </div>
</section>


  
<?php include_once('footer.php'); ?>
 
  
</body>
</html>