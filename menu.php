<?php
session_start();

include('functions.php');
$nbItems = 0; 

echo '<nav class="navbar navbar-expand-sm bg-light justify-content-center">',
        '<ul class="navbar-nav">',
        '<li class="nav-item">',
            '<a class="nav-link" href="index.php">Accueil</a>',
        '</li>',
        '<li class="nav-item">',
            '<a class="nav-link" href="recap.php">Panier</a>',
        '</li>',
        '<li class="nav-item">',
            '<a class="lien" href="recap.php">',
            '<i class="fa-solid fa-cart-shopping fa-2x"></i>',
            '<p class="panier">'.totalItems($nbItems).'</p>',
            '</a>',
        '</li>',
    '</ul>',

'</nav>';

?>

