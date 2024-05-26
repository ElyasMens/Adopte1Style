<?php 
    require '../Authentification/Auth.php';
    force_user_connexion();
    $username = $_COOKIE["user"];
    $title = basename($_SERVER['PHP_SELF'], '.php');
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../Assets/CSS/Header.css">
        <script src="../Assets/JavaScript/Disconnect.js"></script>
        <script src="../Assets/JavaScript/Recherche.js"></script>
        <script src="../Assets/JavaScript/CreateProfile.js"></script>
        <script src="../Assets/JavaScript/Profil.js"></script>
    </head>
    <div class="Header">
        <h2>Adopte1Style</h2>
        <h2><?=htmlentities($title)?></h2>
    </div>  