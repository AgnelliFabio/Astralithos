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
    
</style>

</head>
<body>
<footer>
    <div class="footer-content">
        <img src="assets/img/logo-Astralithos-rectangle.png" alt="Logo" class="logo">
        <button class="btn-connexion">Connexion</button>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Votre entreprise. Tous droits réservés.</p>
    </div>

    <form action="destroy_session.php" method="post">
    <button type="submit" name="destroy">Détruire la session</button>
</form>

</footer>


<label class="t">
    <input class="t__checkbox" type="checkbox" value="on">
    <svg class="t__svg" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <ellipse class="t__svg-dot" cx="6" cy="6" rx="2" ry="1" fill="#fff" transform="rotate(-45,6,6)" />
        <circle class="t__svg-ring" cx="12" cy="12" r="6" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-dasharray="0 5 27.7 5" stroke-dashoffset="0.01" transform="rotate(-90,12,12)"/>
        <line class="t__svg-line" x1="12" y1="6" x2="12" y2="15" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-dasharray="9 9" stroke-dashoffset="3"/>
        <line class="t__svg-line" x1="12" y1="6" x2="12" y2="12" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-dasharray="6 6" stroke-dashoffset="6"/>
    </svg>
    <span class="t__sr">Power</span>
</label>


</body>
</html>