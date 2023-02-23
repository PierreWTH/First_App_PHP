<?php
    session_start();

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
        }
    }

header("Location:index.php");








?>