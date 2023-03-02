<?php ob_start() ?>

    <h1>AJOUTER UN PRODUIT</h1>

    <div class="d-flex justify-content-center">
        
        <?php 
        
        // Affichage nombre de produits dans le panier 
        
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p> Vous n'avez pas de produit dans votre panier <p>.";
        } else {
            echo "<p class='text-dark'> Nombre de produits dans le panier : ".count($_SESSION["products"]).". <p>";
        }

        ?>

    </div>

    <div class="d-flex justify-content-center">
        
        <?php

            // Affichage message succes

            if (isset($_SESSION['message'])){
                $message = $_SESSION['message'];
                echo $message;
                unset($_SESSION['message']);
            }
            
        ?>


    </div>
   
    <div class="form">
        
    <!-- Formulaire -->

        <form action="traitement.php?action=addProduct" method="post" class="form-group">
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
    
    <?php $contenu = ob_get_clean(); 
    $titre = "Ajout Produit"; 
    require 'template.php';
    
    
    ?>


