<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astralithos</title>

    <link rel="stylesheet" type="text/css" href="style/style-home.css">
       
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/img/logo-Astralithos-sans-fond.png">

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


  
  <button class="btn" type="button">
  <strong>DÉCOUVRIR</strong>
  <div id="container-stars">
    <div id="stars"></div>
  </div>

  <div id="glow">
    <div class="circle"></div>
    <div class="circle"></div>
  </div>
</button>

<style>
  .btn {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 15rem;
  height: 4.5rem;
  background-size: 300% 300%;
  backdrop-filter: blur(1rem);
  border-radius: 5rem;
  transition: 0.5s;
  animation: gradient_301 5s ease infinite;
  border: double 6px transparent;
  background-image: linear-gradient(#222A3C, #222A3C),  linear-gradient(137.48deg, #eda93b 5%,#4F505E 45%, #3C4865 67%, #9da4b2 87%);
  background-origin: border-box;
  background-clip: content-box, border-box;
  margin-top: 15px;
}

#container-stars {
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  overflow: hidden;
  transition: 0.5s;
  backdrop-filter: blur(1rem);
  border-radius: 5rem;
}

strong {
  z-index: 2;
  font-family: 'Poppins'; /*'Avalors Personal Use'*/
  font-size: 17px;
  letter-spacing: 5px;
  color: #FFFFFF;
  text-shadow: 0 0 4px white;
}

#glow {
  position: absolute;
  display: flex;
  width: 12rem;
}

.circle {
  width: 100%;
  height: 30px;
  filter: blur(2rem);
  animation: pulse_3011 4s infinite;
  z-index: -1;
}

.circle:nth-of-type(1) {
  background: rgba(254, 83, 186, 0.636);
}

.circle:nth-of-type(2) {
  background: rgba(142, 81, 234, 0.704);
}

.btn:hover #container-stars {
  z-index: 1;
  background-color: #222A3C;
}

.btn:hover {
  transform: scale(1.1)
}

.btn:active {
  border: double 4px #FE53BB;
  background-origin: border-box;
  background-clip: content-box, border-box;
  animation: none;
}

.btn:active .circle {
  background: #FE53BB;
}

#stars {
  position: relative;
  background: transparent;
  width: 200rem;
  height: 200rem;
}

#stars::after {
  content: "";
  position: absolute;
  top: -10rem;
  left: -100rem;
  width: 100%;
  height: 100%;
  animation: animStarRotate 90s linear infinite;
}

#stars::after {
  background-image: radial-gradient(#ffffff 1px, transparent 1%);
  background-size: 50px 50px;
}

#stars::before {
  content: "";
  position: absolute;
  top: 0;
  left: -50%;
  width: 170%;
  height: 500%;
  animation: animStar 60s linear infinite;
}

#stars::before {
  background-image: radial-gradient(#ffffff 1px, transparent 1%);
  background-size: 50px 50px;
  opacity: 0.5;
}

@keyframes animStar {
  from {
    transform: translateY(0);
  }

  to {
    transform: translateY(-135rem);
  }
}

@keyframes animStarRotate {
  from {
    transform: rotate(360deg);
  }

  to {
    transform: rotate(0);
  }
}

@keyframes gradient_301 {
  0% {
    background-position: 0% 50%;
  }

  50% {
    background-position: 100% 50%;
  }

  100% {
    background-position: 0% 50%;
  }
}

@keyframes pulse_3011 {
  0% {
    transform: scale(0.75);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
  }

  70% {
    transform: scale(1);
    box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
  }

  100% {
    transform: scale(0.75);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
  }
}
</style>

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
                  
                      <button class="btn" type="button">
                    <strong>CONNEXION</strong>
                      <div id="container-stars">
                        <div id="stars"></div>
                      </div>

  <div id="glow">
    <div class="circle"></div>
    <div class="circle"></div>
  </div>
</button>

                      
                        
      </div>
    </div>
  </div>
</section>

<?php include_once('footer.php'); ?>
 
  
</body>
</html>