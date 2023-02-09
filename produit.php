<?php
  require("article.php");
  $produits = affiche();

  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cox.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<header class="nav">
        <h1>AnimedclanX</h1>
        <div class="nav">
            <ul>
                <li><a href="dada.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="produit.php"><i class="fas fa-box"></i> Produits</a></li>
                <li><a href="connexion.php"><i class="fas fa-user"></i> Compte</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="#"><i class="fas fa-info-circle"></i>  A propos</a></li>
                <li><a href="panier.php"><i class="fas fa-shopping-cart"></i><span><?=array_sum($_SESSION['panier'])?></span> Panier</a></li>
            </ul>
        </div>
    </header>
<main>

    <section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
        </div>
    </div>
    </section>

    <div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach($produits as $produit): ?>
        <div class="col">
            <div class="card shadow-sm">
            <title><?= $produit->nom ?></title>
            <img src="<?= $produit->image ?>" alt="image">
            <div class="card-body">
                <p class="card-text"><?= $produit->description ?></p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a class="boutton-article" href="ajouter_au_panier.php?id=<?= $produit->id ?>">Achete</a></button>
                </div>
                <small class="text-muted"><?= $produit->prix ?> €</small>
                </div>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
    </main>
  <footer>
    <p>Copyright © 2023 Mon mini site e-commerce</p>
  </footer>
</body>
</html>