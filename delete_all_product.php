<?php
session_start();

if (isset($_POST['index']) && $_POST['index'] === 'deleteallproduct') {
    unset($_SESSION['products']);
}

header('Location: recap.php');
exit;
?>
