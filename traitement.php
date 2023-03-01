<?php
    session_start();

    if(isset($_GET["action"])) {

        switch($_GET["action"]) {

            case "addProduct":
                // Limiter l'accès a traitement.php aux seules requêtes provenant de la soumission de notre formulaire
                if (isset($_POST['submit'])){
                    // Filtrage des données de input
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                
                    // Verification des troix variables épurées. On voit si le filtre a renvoyé null ou false.
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
                        //On met un message d'erreur
                        $_SESSION['message'] = " <div class='alert alert-danger' role='alert'> Erreur. Le produit n'a pas été ajouté au panier. </div>";
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