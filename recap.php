<?php ob_start() ?>
    
    <h1>MON PANIER</h1>

    <a href="traitement.php?action=deleteAllProduct"><button type="button" class="btn btn-danger">Vider le panier</button></a>

    <?php 

$contenu = ob_get_clean(); 
$titre = "Mon panier"; 
require 'template.php';
    
    ?>
    <?php

    // Message de suppression d'un produit

    if (isset($_SESSION['deleteMsg'])){
        $deleteMsg = $_SESSION['deleteMsg'];
        echo $deleteMsg;
        unset($_SESSION['deleteMsg']);
    }

    // Message de vidage de panier

    if (isset($_SESSION['deleteMsg2'])){
        $deleteMsg2 = $_SESSION['deleteMsg2'];
        echo $deleteMsg2;
        unset($_SESSION['deleteMsg2']);
    }

    // Si product n'existe pas ou que le panier est vide :

    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p> Vous n'avez pas de produit dans votre panier <p>";
    }

    // Si il y a des produits en session, affichage d'un tableau :

    else{

        echo "<p class='text-dark'> Nombre de produits dans le panier : ".count($_SESSION["products"]).". <p>";

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
        

        //Boucle pour chaque donnée de SESSION : index numerote chaque produit, product contient le produit
    
        $totalGeneral = 0;
        
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>

                        <a href='traitement.php?action=lessQty&index=$index'class ='text-decoration-none'><button type='button' class='btn btn-secondary'>-</button></a>

                        <span class = mx-2>".$product['qtt']."</span>

                        <a href='traitement.php?action=moreQty&index=$index'class ='text-decoration-none'><button type='button' class='btn btn-secondary'>+</button></a>

                    </td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>

                        <a href='traitement.php?action=deleteThisProduct&index=$index'><button type='button' class='btn btn-secondary'>Supprimer</button></a>

                    </td>",
                "</tr>";
    
                // Ajout de la valeur du produit parcouru au total general
                $totalGeneral += $product['total'];
    
                
        }
        echo "<tr>",
                "<td colspan=4> Total General : </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp€</strong><td>",
            "</tr>",
            "</tbody>",
            "</table";
    }
    
    
    ?>






