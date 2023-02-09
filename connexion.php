<?php include('header.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <H1>CONNEXION</H1>
    <form class="connexion" action="login.php" method="post">
        <label for="pseudo">pseudo : </label><br><br>
        <input type="text" id="pseudo" name="pseudo"><br><br>
        <label for="mot_de_passe">mot de passe : </label><br><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe"><br><br>
        <input type="submit" name="submit" value="Connexion">
        
    </form>
    <p><a href="inscription.php"></a></p>
</body>
</html>
