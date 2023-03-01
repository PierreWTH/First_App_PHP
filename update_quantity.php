<?php
session_start();

// On verif
if(isset($_POST['index']) && isset($_POST['action'])) {
    $index = $_POST['index'];
    $action = $_POST['action'];
  
    if(isset($_SESSION['products'][$index])) {
      $product = $_SESSION['products'][$index];
      $qtt = $product['qtt'];
  
      if($action === 'plus') {
        $qtt++;
      } else if($action === 'moins') {
        $qtt--;
      }
  
      if($qtt <= 0) 
      {
        unset($_SESSION['products'][$index]);
        } 
        else {
            $total = $product['price'] * $qtt;
            $_SESSION['products'][$index]['qtt'] = $qtt;
            $_SESSION['products'][$index]['total'] = $total;
        }
    }
}

    

header('Location: recap.php');
exit();
?>
