<?php
session_start();

if(isset($_POST['index'])){
    $index = $_POST['index'];
    unset($_SESSION['products'][$index]);
}

header('Location: recap.php');
exit;
?>
