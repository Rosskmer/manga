<?php
    include('Base_de_donnée.php');

    if(isset($_POST['submit'])){

        $pseudo= $_POST['pseudo'];
        $mot_de_passe = $_POST['mot_de_passe'];

        if(empty($pseudo) || empty($mot_de_passe)){
            echo "REMPLIR LES CHAMPS !";
        }else{
            $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->execute();

            if($stmt->rowCount() == 0){
                echo "PSEUDO OU MOT DE PASSE INCORECT";
            }else{
                $hask = $stmt->fetch(PDO::FETCH_ASSOC)['passwords'];

                if(password_verify($mot_de_passe, $hask)){

                    $token = bin2hex(random_bytes(32));
                    $stmt = $conn->prepare("UPDATE utilisateur SET token = :token WHERE pseudo = :pseudo");
                    $stmt->bindParam(':token', $token);
                    $stmt->bindParam(':pseudo', $pseudo);
                    $stmt->execute();
                    session_start();
                    $_SESSION['token'] = $token;
                    $_SESSION['pseudo'] = $pseudo;
                    $ip = $_SERVER['REMOTE ADDR'];
                    date_default_timezone_set('Europe/Paris');
                    $time = date('d-m-Y  H:i:s');

                    $stmt = $conn->prepare("UPDATE utilisateur SET ip = :ip, time = :time WHERE pseudo = :pseudo");
                    $stmt->bindParam(':ip', $ip);
                    $stmt->bindParam(':time', $time);
                    $stmt->bindParam('pseudo', $pseudo);
                    $stmt->execute();
                    header('Location: dada.php');
                    exit();
                }else{
                    echo "ERREUR DE CONNEXION";
                }
            }
        }
    }
?>