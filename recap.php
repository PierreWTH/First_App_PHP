<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php
    // Verification si la clé product n'existe pas ou ne contient aucune donnée
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p> Aucun produit en session <p>";
    }
    // Si il y a des produits en session, affichage d'un tableau :
    else{

        echo
            "<table>",
            "<thead>",
                "<tr>",
                    "<th>#</th>",
                    "<th>Name</th>",
                    "<th>Price</th>",
                    "<th>Quantity</th>",
                    "<th>Total</th>",
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
                "</tr>";
                $totalGeneral += $product['total'];
        }
        echo "<tr>",
                "<td colspan=4> Total General : </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp€</strong><td>",
            "</tr>",
            "</tbody>";
            

        
        echo "</tbody>",
            "</table";

    }
    
    
    
    
    
    
    
    ?>
</body>
</html>