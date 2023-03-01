<?php
    session_start();

    // Si action existe

    if(isset($_GET["action"])) {

        switch($_GET["action"]) {

            // On ajoute les produits 

            case "addProduct":

                // Verification que submit existe pour limiter l'acces aux personnes qui ont validé le formulaire

                if (isset($_POST['submit'])){

                    $min = 0;

                    // Filtrage des données de input
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, ["options" => ["min_range"=>$min]]);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT, ["options" => ["min_range"=>$min]]);
                
                    // Verification des troix variables épurées

                    if ($name && $price && $qtt){

                        // Assignations dans $product

                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
            
                        // On enregistre $product en session
                        $_SESSION['products'][] = $product;

                        // On met un message de succès
                        $_SESSION['message'] = " <div class='alert alert-success' role='alert'> Le produit " .$product['name']. " à bien été ajouté au panier. </div>";
                    }
                    
                    else {
                        //Si les conditions de filtrage ne sont pas remplies, message d'erreur
                        $_SESSION['message'] = " <div class='alert alert-danger' role='alert'> Erreur. Votre produit n'est pas valide. </div>";
                    }
                        
                }
            
                header("Location: index.php");
                break;

            case "deleteAllProduct":
                    unset($_SESSION['products']);
                
                header('Location: recap.php');
                break;


            case "deleteThisProduct":
                unset($_SESSION["products"][$_GET['index']]);
                $_SESSION['deleteMsg']= " <div class='alert alert-success' role='alert'> Ce produit à bien été supprimé du panier. </div>";
                
                header('Location: recap.php');
                
                break;

            case "moreQty":
                $_SESSION["products"][$_GET['index']]['qtt']++;
                $_SESSION["products"][$_GET['index']]['total'] = $_SESSION["products"][$_GET['index']]['qtt'] * $_SESSION["products"][$_GET['index']]['price'];
                

                header('Location: recap.php');
               
                break;

            case "lessQty":
                $_SESSION["products"][$_GET['index']]['qtt']--;
                $_SESSION["products"][$_GET['index']]['total'] = $_SESSION["products"][$_GET['index']]['qtt'] * $_SESSION["products"][$_GET['index']]['price'];

                    if ($_SESSION["products"][$_GET['index']]['qtt'] == 0){
                        unset($_SESSION["products"][$_GET['index']]);
                    }

                header('Location: recap.php');
                break;

        }
    }


?>