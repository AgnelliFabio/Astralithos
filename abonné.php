<?php
session_start();
if(!isset($_SESSION['admin']) && isset($_SESSION['user']))
{
    header("Location: index.php?msg=acces invalide");
    exit;
}
?>

ceci est la page pour les abonnées et les admins