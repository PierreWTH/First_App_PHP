
<?php

// Ouverture de session

session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

    <title><?= $titre ?></title>
</head>

<?php

function totalItems($total) 
{
	if (empty($_SESSION['products'])) 
    {
		echo '<p class="panier">0</p>';
	} 
    else 
    {
		foreach ($_SESSION['products'] as $index => $product) {
			$total += $product['qtt'];
		}
		return  $total ;
	}
}

$nbItems = 0; 

?>

<body> <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="recap.php">Panier</a>
        </li>
        <li class="nav-item">
            <a class="lien" href="recap.php">
            <i class="fa-solid fa-cart-shopping fa-2x"></i>
            <p class="panier"><?=totalItems($nbItems)?></p>
            </a>
        </li>
    </ul>
</nav>



<?= $contenu ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>


