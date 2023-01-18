<!DOCTYPE html>

<head>
<link href="public\Connexion.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>

<title>Connexion</title>

<body>

    <div id="connexion">

        <h2>Connexion</h2>
        
        <form id="informations" method="POST">
            <div id="login">Email :</div> <input id="barreLogin" type="email" name="email" required></br>
            <div id="mdp">Mot de passe :</div> <input id="barreMdp" type="password" name="password" required></br>
            <button id="connexionBtn" type="submit" name="action" value="connexion">Connexion</buttom>
        </form>      

    </div>

</body>


<?php
    
    require_once("user.php");

    $user = new user();

    if(isset($_POST["email"]) && isset($_POST["password"])){

        $user->verifyUser($_POST["email"], $_POST["password"]);

    }


?>

