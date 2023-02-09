<?php
    include('article.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cox.css">
    <title>Header</title>
</head>
<body>
<header>
        <h1>AnimedclanX</h1>
        <div class="nav">
            <ul>
                <li><a href="dada.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="produit.php"><i class="fas fa-box"></i> Produits</a></li>
                <li><a href="connexion.php"><i class="fas fa-user"></i> Compte</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="#"><i class="fas fa-info-circle"></i>  A propos</a></li>
                <li><a href="panier.php"><i class="fas fa-shopping-cart"><span><?=array_sum($_SESSION['panier'])?></span></i> Panier</a></li>
            </ul>
        </div>
    </header>
</body>
</html>