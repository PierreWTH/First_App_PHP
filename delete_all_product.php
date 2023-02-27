<?php
session_start();

if (isset($_POST['index']) && $_POST['index'] === '-1') {
    unset($_SESSION['products']);
}

// Rediriger l'utilisateur vers la page de récapitulatif des produits
header('Location: recap.php');
exit;
?>
