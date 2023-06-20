<?php
session_start();

// Vérifier si l'utilisateur est administrateur
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    // L'utilisateur est administrateur, permettre l'accès à la page
    // Placez ici le contenu de la page accessible uniquement aux administrateurs
} else {
    // L'utilisateur n'est pas administrateur, rediriger vers une autre page ou afficher un message d'erreur
    header("Location: index.php"); // Redirection vers une page d'accès non autorisé
    exit(); // Arrêter l'exécution du script
}
?>

c'est la page admin