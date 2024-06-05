<?php 
    require '../Assets/Elements/Header.php';
    require '../Assets/Elements/Sidebar.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adopte1Style | Accueil</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Assets/CSS/Accueil.css">
        <script src="../Assets/JavaScript/Accueil.js"></script>
    </head>
    <body> 
    <section class="home-section">
        <div class="main-container">
            <?php require '../Assets/SessionStatus.php';?>
            <?php if ($username) : ?>
                <div>Bonjour, <?= htmlentities($username)?></div>
            <?php endif?>
        </div>        
    </section>
    </body>
</html>