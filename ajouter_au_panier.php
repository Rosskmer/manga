<?php
    include('article.php');
    
/*VERIFIER SI LA SESSION EXISTE */

    if(!isset($_SESSION)){

/* SINON DEBUTER LA SESSISON */

        session_start();
    }

/*CREER LA SESSION */
    
if(!isset($_SESSION['panier'])){
/*SI LA SESSION N'EXISTE PAS ALORS ON CREER LA SESSION ET ON Y MET UN TABLEAU */

        $_SESSION['panier'] = array();

    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        
        
    $stmt = $conn->prepare("SELECT * FROM produits WHERE id=:i");
    $stmt->bindparam(':i', $id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        die("LE PRODUIT N'EXISTE PLUS");
    } else {
        /* AJOUTER LE PRODUIT AU PANIER (Tableau) */

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        if (isset($_SESSION['panier'][$id])) {
            /* ALORS SI JE PRODUIT EST DEJA DANS LE PANIER ALORS ELLE S'AJOUTE ENCORE */

            $_SESSION['panier'][$id]++; /* Representer la Quantité */
        } else {
            /* SINON RAJOUTER DANS LE PANIER */

            $_SESSION['panier'][$id] = 1;
            

            
        }

        header('Location: produit.php');
    }
}
?>