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

</body>
</html>