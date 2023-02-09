<?php include('header.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Iscription</title>
</head>
<body>
    <h1>Veuillez vous Inscrire !</h1>
    <form class="inscription" action="recuperation_donnée.php" method="post">
        <label for="nom">NOM :</label>
        <input type="text"  id="nom" name="nom" required><br><br><br>
        <label for="prenom">PRENOM :</label>
        <input type="text"  id="prenom" name="prenom" required><br><br><br>
        <label for="adresse">ADRESSE :</label>
        <input type="text"  id="adresse" name="adresse" required><br><br><br>
        <label for="telephone">TELEPHONE :</label>
        <input type="text"  id="telephone" name="telephone" required><br><br><br>
        <label for="pseudo">PSEUDO:</label>
        <input type="text"  id="pseudo" name="pseudo" required><br><br><br>
        <label for="mot_de_passe">MOT DE PASSE :</label>
        <input type="password"  id="mot_de_passe" name="mot_de_passe" required><br><br><br>
        <input type="submit" name="submit" value="ENREGISTRE !">
        <a href="connexion.php"><input type="submit" value="J'ai un compte !"></a>
    </form>
</body>
</html>