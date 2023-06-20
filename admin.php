<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header("Location: index.php?msg=acces invalide");
    exit;
}
?>

cette page est reserve au admin 