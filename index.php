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
  </head>

    <title>Ajout Produit</title>
</head>
    
<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="recap.php">Mon panier</a></li>
        </ul>
    </nav>

    <h1>AJOUTER UN PRODUIT</h1>

    <div class="d-flex justify-content-center">
        
        <?php
        $num_products = count($_SESSION['products']); 
        echo "<p> Nombre de produits dans le panier : ".$num_products.".<p>"
        ?>
    </div>

    <div class="form">
    <!-- action : indique la cible du formulaire, méthod : méthode par laquelle les données HTTP seront transmises -->
        <form action="traitement.php" method="post" class="form-group">
            <p>
                <label>
                    Nom du produit :
                    <input class="choice form-control form-control"type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit : 
                    <input class = "choice form-control"type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input class = "choice form-control" type="number" name="qtt">
                </label>
            </p>
            <p>
                <input class="submit" type = "submit" name = "submit" value="Ajouter le produit">
            </p>
        </form>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>