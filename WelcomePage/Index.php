<?php
    require '../Includes/Auth.php';
    session_opened();
    $_SESSION['connected']='guest';
    //}
?>   
<?php require '../Includes/Elements/Header.php';?>
<!DOCTYPE html>
    <head>
        <title>Adopte1Style</title>
        <link rel="stylesheet" href="../Assets/CSS/Index.css">
    </head>
    <!----------> 
    <body>
        <div class="Container">
            <div class="content-c1-l1">   
                <?php require '../Includes/SessionStatus.php'?>
            </div>
            <div class="Hidden" id="ConnexionDiv">
                <form action="../SignUpLoginFolder/Login/LoginForm.php" method="post" id="Connexion">
                    <div class="TitleForm">
                        <p>CONNEXION</p>
                    </div>
                    <div class="ConnexionForm">
                        <label for="username">NOM D'UTILISATEUR</label>
                        <input name="username" placeholder="Nom d'utilisateur">
                        <label for="password">MOT DE PASSE</label>
                        <input name="password" placeholder="Mot de passe" autocomplete="new-password" minlength="6">
                        <div class="Option">
                            <input type="checkbox" name="Memorise" id="Memorise"><label for="Memorise" id="Memorise">Mémoriser</label>
                            <a href="#">Mot de passe oublié</a>
                        </div>                        
                        <div>
                            <input type="submit" value="Connexion" id="postButton">
                        </div>
                        <?php if($error): ?>
                            <script>error();</script>
                        <?php endif; ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Footer-->
        <?php require '../Includes/Elements/Footer.php';?>
    </body>
</html>
