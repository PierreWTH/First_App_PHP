<?php

// Compter produits panier

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

?>