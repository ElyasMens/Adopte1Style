<?php require '../Includes/Elements/Headers/Header.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adopte1Style</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Home.css">
        <script src="Home.js"></script>
    </head>
    <body>   
    <?php require '../Includes/SessionStatus.php';?>
    <?php if ($username) : ?>
        <div>Bonjour, <?= htmlentities($username)?></div>
    <?php endif?>
    </body>
</html>