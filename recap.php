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
    <title>Récapitulatif des produits</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="recap.php">Mon panier</a></li>
        </ul>
    </nav>
    
    <h2>MON PANIER</h2>
    <?php
    // Verification si la clé product n'existe pas ou ne contient aucune donnée
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p> Vous n'avez pas de produit dans votre panier <p>";
    }
    // Si il y a des produits en session, affichage d'un tableau :
    else{

        echo
            "<table class='table'>",
            "<thead>",
                "<tr>",
                    "<th>#</th>",
                    "<th scope='col'>Name</th>",
                    "<th scope='col'>Price</th>",
                    "<th scope='col'>Quantity</th>",
                    "<th scope='col'>Total</th>",
                "</tr>",
            "</thead>",
            "<tbody";
        

        //boucle pour chaque donnée de SESSION : index numerote chaque produit, product contient le produit
    
        $totalGeneral = 0;
        
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td><form method='POST' action='delete_product.php'><input type='hidden' name='index' value='".$index."'><button type='submit' class='btn btn-dark'>Supprimer</button></form></td>",
                "</tr>";
    
                // Ajout de la valeur du produit parcoura au total general
                $totalGeneral += $product['total'];
    
                
        }
        echo "<tr>",
                "<td><form method='POST' action='delete_all_product.php'><input type='hidden' name='index' value='-1'><button type='submit' class='btn btn-danger'>Tout supprimer</button></form></td>",
                "<td colspan=4> Total General : </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp€</strong><td>",
            "</tr>",
            "</tbody>",
            "</table";

        var_dump($index);
    }
    
    ?>

    <div class="d-flex justify-content-center">
        
        <?php
        $num_products = count($_SESSION['products']); 
        echo "<p> Nombre de produits dans le panier : ".$num_products.".<p>"
        ?>
    </div>
        



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>