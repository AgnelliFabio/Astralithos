<?php
session_start();

// Détruire la session
session_unset();
session_destroy();

header("Location: form.php");
exit;
?>
