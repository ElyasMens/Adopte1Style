<?php
    //Pour le status de la session
    require '../Includes/Auth.php';
    if(!user_connected()){
        $_SESSION['connected'] = 'guest';
    }

    //Pour le message d'erreur
    $erreur=NULL;
    if(isset($_COOKIE['ERROR_MESSAGE'])){
        $erreur = $_COOKIE['ERROR_MESSAGE'];
    }
?> 
<div id="background" class="content-bg-wrap-left bg-landing"></div>
<?php require '../Includes/Elements/Headers/IndexHeader.php';?>
    <head>
        <title>Adopte1Style</title>
        <link rel="stylesheet" href="../Assets/CSS/Index.css">
    </head>
    <!----------> 
    <body>
        <div class="Container">
            <div class="Content" id="c1-l1">   
                <?php require '../Includes/SessionStatus.php';?>
                <h1 style=font-size:50;>L'amour est dans le dressing</h1>
            </div>
            <div class="Hidden" id="c2-l1">
                <form action="../Authentification/Login/LoginForm.php" method="post" id="Connexion">
                    <div class="TitleForm">
                        CONNEXION
                    </div>
                    <?php if ($erreur): ?>
                        <script>Reveal(true);</script>
                        <div id="ErrorMessage"> <?= htmlentities($erreur)?></div>
                        <?php $erreur = NULL; ?>
                    <?php endif; ?>
                    <div class="ConnexionForm">
                        <label for="username">NOM D'UTILISATEUR</label>
                        <input name="username" placeholder="Nom d'utilisateur" id="input1" required>
                        <label for="password">MOT DE PASSE</label>
                        <input type="password" name="password" placeholder="Mot de passe" autocomplete="new-password" minlength="6" id="input2" required>
                        <div id="Option">
                            <a href="#">Mot de passe oublié</a>                            </div>                        
                        <div class="postButtonDiv">
                            <input type="submit" value="Connexion" id="postButton">
                        </div>
                    </div>
                </form>
            </div>
            <div class="Content" id="c2-l2">
                   <h2>Un réseau<br>social de sapeurs</h2>     
            </div>
            <div class="Content" id="c2-l2">
                    <div>Adopte1Style te permet de rencontrer des personnes qui partagent ta passion pour la mode et ta conscience vestimentaire.<br> Rencontrez de nouveaux amis qui sont passionnés par la mode éthique, le vintage, ou les dernières tendances sur Adopte1Style!</div>
            </div>
        </div>
    </body>
    <!--Footer-->
    <?php require '../Includes/Elements/Footer.php';?>
                