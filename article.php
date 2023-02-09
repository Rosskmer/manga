<?php
include('Base_de_donnée.php');
function ajouter($nom, $image, $prix, $description){
    if(include('Base_de_donnée.php')){
        $stmt = $conn->prepare("INSERT INTO produits(nom, image, description, prix) VALUES($nom, $image, $prix, $description)");
        $stmt->execute(array($nom, $image, $prix, $description));
        exit();


        
    }
}

    function affiche(){
        if(include('Base_de_donnée.php')){
            $stmt = $conn->prepare("SELECT * FROM produits ORDER BY id DESC");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
            exit();
        }
    }

    function supprime($id){
        if(include('Base_de_donnée.php')){
            $stmt = $conn->prepare("DELETE * FROM produits WHERE id=?");
            $stmt->execute(array($id));
            exit();
        }
    }
?>