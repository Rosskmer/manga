<?php
    include('Base_de_donnée.php');

    if(isset($_POST['submit'])){
        
        $nom = $_POST['nom'];
        $prenom  = $_POST['prenom'];
        $adresse  = $_POST['adresse'];
        $telephone  = $_POST['telephone'];
        $pseudo  = $_POST['pseudo'];
        $mot_de_passe  = $_POST['mot_de_passe'];

        $blosh = password_hash($mot_de_passe, PASSWORD_ARGON2I);

        if(empty($nom) || empty($prenom) || empty($adresse) || empty($telephone) || empty($pseudo) || empty($mot_de_passe)){
            echo "TOUS LES CHAMPS SONT OBLIGATOIRE !";
        }else{
            $stmt = $conn->prepare("INSERT INTO UTILISATEUR (nom, prenom, adresse, telephone, pseudo, passwords) VALUES(
                :nom, :prenom, :adresse, :telephone, :pseudo, :mot_de_passe
                )");
                $stmt->bindparam(':nom', $nom);
                $stmt->bindparam(':prenom', $prenom);
                $stmt->bindparam(':adresse', $adresse);
                $stmt->bindparam(':pseudo', $pseudo);
                $stmt->bindparam(':mot_de_passe', $blosh);
                $stmt->bindparam(':telephone', $telephone);

            $stmt->execute();

            header('Location: connexion.php');
            exit();
                
        }
    }
?>