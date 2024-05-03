<?php
session_start();
echo $_SESSION['error'];
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Connexion.css">
    </head>
    <body>
        <form action="verifConnexion.php" method="post">
            <div><label for="identifier">Pseudo</label><input name="identifier"></div>
                <div><label for="password">Mot de passe</label><input name="password"></div>
                    <input class="submit" type="submit">           
        </form>
    </body>
</html>
