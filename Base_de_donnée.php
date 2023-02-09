<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'SESSION';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*$sql = 'CREATE DATABASE SESSION';

        if($conn->exec($sql)){
            echo "CREATION BASE DE DONNEE REUSSI";
        }else{
            echo "ERREUR DE CREATION DE LA BDD";
        }

        $conn->query('USE SESSION');
        $stmt = $conn->prepare("CREATE TABLE produits(
            id int(6) AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(255) NOT NULL,
            image VARCHAR(255) NOT NULL,
            description text(255) NOT NULL,
            prix int(255) NOT NULL,
            quantite INT(255) NOT NULL
            
        )");

        if($stmt->execute()){
            echo "TABLE CREE AVEC SUCCES";
        }else{
            echo "ERREUR DE CREATION DE LA TABLE";
        }*/

    }catch(PDOException $e){
        echo " ERREUR CONNECTION A LA BDD !".$e->getMessage();
    }
?>