<?php
    //Pour le status de la session
    require 'Authentification/Auth.php';
    if(!user_connected()){
        $_SESSION['module'] = 'guest';
    }

    //Pour le message d'erreur
    $erreur = null;
    if (isset($_COOKIE['ERROR_MESSAGE_LOGIN']) || isset($_COOKIE['ERROR_MESSAGE_SIGNUP'])) {
        $erreur = $_COOKIE['ERROR_MESSAGE_LOGIN'] ?? $_COOKIE['ERROR_MESSAGE_SIGNUP'];
        setcookie('ERROR_MESSAGE_LOGIN', '', time() - 3600, '/');
        setcookie('ERROR_MESSAGE_SIGNUP', '', time() - 3600, '/');
    }
?>    
<html lang='fr'>
    <?php require 'Assets/Elements/IndexHeader.php';?>
<div id="background" class="content-bg-wrap-left bg-landing"></div>
    <head>
        <meta http-equiv="refresh" content="">
        <script src="../Assets/JavaScript/Index.js"></script>
        <title>Adopte1Style</title>
       <link rel="stylesheet" href="Assets/CSS/Index.css">   
    </head>
    <!----------> 
    <body>
        <div class="Container">
            <div class="Content" id="c1-l1">   
                <h1 style=font-size:50;>L'amour est dans le dressing</h1>
                <button onclick="RevealSignUp()" id="InscriptionConnexion2">S'inscrire</button>
            </div>
            <div class="" class="Content" id="c2-l1">
                <form action="Authentification/Login.php" method="post" id="Connexion" class="hidden-form">
                    <div class="TitleForm">
                        CONNEXION
                    </div>
                    <?php if ($erreur == 'IDENTIFIANT OU MOT DE PASSE INCORRECT.'): ?>
                        <script>Reveal(true,'Log');</script>
                        <div id="ErrorMessage"> <?= htmlentities($erreur);?></div>
                    <?php endif; ?>
                    <div class="LoginForm">
                        <label for="username">NOM D'UTILISATEUR</label>
                        <input name="username" placeholder="Nom d'utilisateur" class="ipt" required>
                        <label for="password">MOT DE PASSE</label>
                        <input type="password" name="password" placeholder="Mot de passe" autocomplete="new-password" minlength="6" class="ipt" required>
                        <div id="Option">
                            <a href="#">Mot de passe oublié</a>                           
                        </div>                        
                        
                        <div class="post-btn-div">
                            <input type="submit" value="Se connecter" class="post-btn">
                        </div>
                    </div>
                </form>

                <form action="Authentification/SignUp.php" method="post" id="Inscription" class="hidden-form">
                    <div class="TitleForm">
                        INSCRIPTION
                    </div>
                    <?php if ($erreur!=NULL && $erreur  != 'IDENTIFIANT OU MOT DE PASSE INCORRECT.'): ?>
                        <script>RevealSignUp();</script>
                        <div id="ErrorMessage"><?= htmlentities($erreur);?></div>
                    <?php endif; ?>
                    <div class="SignUpForm">
                        <label for="name">NOM</label>
                        <input name="name" placeholder="Nom" class="ipt" minlength="3" maxlength="20" required>
                        <label for="email">Email</label>
                        <input name="email" placeholder="Email" class="ipt" maxlength="320" required>
                        <label for="username">NOM D'UTILISATEUR</label>
                        <input name="username" placeholder="Nom d'utilisateur" class="ipt" required>
                        <label for="password">MOT DE PASSE</label>
                        <input type="password" name="password" placeholder="Mot de passe" autocomplete="new-password" minlength="6" maxlength="30" class="ipt" required>                 
                        
                        <div class="post-btn-div">
                            <input type="submit" value="S'inscrire" class="post-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="Content" id="c2-l2">
                    <h2>Un réseau<br>social de sapeurs</h2>     
                </div>
                <div class="Content" id="c2-l2">
                        <div>Adopte1Style te permet de rencontrer des personnes qui partagent ta passion pour la mode et ta conscience vestimentaire.<br> Rencontrez de nouveaux amis qui sont passionnés par la mode éthique, le vintage, ou les dernières tendances sur Adopte1Style!</div>
                </div>
            </div>
        </div>
            <!--Footer-->
    <?php require 'Assets/Elements/Footer.php';?>
    </body>
</html>         