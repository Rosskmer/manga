<?php
session_start();
include('Base_de_donnée.php');

// initialiser la variable $_SESSION['panier'] s'il n'est pas déjà défini
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (isset($_GET['del'])) {
   $id_del = $_GET['del'];
   unset($_SESSION['panier'][$id_del]);
}

// vérifier si l'utilisateur a cliqué sur le bouton Ajouter au panier

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cox.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Panier</title>
</head>
<body >

    <div class="panier">
        <h4 class="Boutique"><a href="produit.php" class="link">Boutique</a></h4>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quatité</th>
                <th>Action</th>
            </tr>
            <?php
                $total = 0;
                $ids = array_keys($_SESSION['panier']);
                if(empty($ids)){
                    echo 'votre panier est vide';
                }else{

                    
                    $query = "SELECT * FROM PRODUITS WHERE ";
                    for ($i = 0; $i < count($ids); $i++) {
                        $query .= "id = :id" . $i;
                        if ($i < count($ids) - 1) {
                            $query .= " OR ";
                        }
                    }
                    $stmt = $conn->prepare($query);
                    for ($i = 0; $i < count($ids); $i++) {
                        $stmt->bindValue(":id" . $i, $ids[$i]);
                    }
                    $stmt->execute();
                    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $total = 0;
                    if (isset($produits))
                    foreach($produits as $produit):

                        $total = $total + $produit['prix'] * $_SESSION['panier'][$produit['id']];
                    ?>
                    <tr>
                    <td><img src="<?=$produit['image']?>"></td>
                    <td><?=$produit['nom']?></td>
                    <td><?=$produit['prix']?> €</td>
                    <td><?=$_SESSION['panier'][$produit['id']]?></td>
                    <td><a href="panier.php?del=<?=$produit['id']?>"><img src="icons8-supprimer-pour-toujours-48.png" alt=""></a></td>
                  </tr>

            <?php endforeach; } ?>    
            
            
            <tr class="total">
                <th>Total : <?=$total?> €</th>
            </tr>
        </table>
    </section>
    </div>
</body>
</html>