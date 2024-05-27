<?php 
    require '../Assets/Elements/Header.php';
    require '../Assets/Elements/Sidebar.php';
    if (isset($_COOKIE['user_selected']) && $_COOKIE['user_selected'] != "self"){
        $username = $_COOKIE['user_selected'];
    }elseif(isset($_COOKIE['user'])){
            $username = $_COOKIE['user'];
            setcookie('user_selected', $username, time()-60*60, '/');
    }
    $connexion = Connexion();
    $userInfo = User_InfoExists($username, $connexion);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adopte1Style | Profil</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Assets/CSS/Profil.css">
    </head>
    <body> 
    <section class="profile-section">
        <div class="main-container">
            <?php if ($userInfo): ?>
                <div class="profile-content">
                <?php if($username == $_COOKIE['user']): ?>
                        <div class="profile-actions">
                            <a href="Modifier Profil.php" class="btn-edit">Éditer le profil</a>
                        </div>
                        <?php else: ?>
                            <div class="profile-actions">
                            <a href="../Messaging/Messages.php" onclick="Set_a_Cookie('messages','<?= htmlentities($userInfo['username']);?>')" class="btn-message">Envoyer un message</a>
                        </div> 
                    <?php endif; ?>
                    <img class="profile-img" src="<?=htmlentities($userInfo['user_photo']);?>">
                    <div class="profile-header">
                        <h1><?=htmlentities($userInfo['username']); ?></h1>
                    </div>
                    <div class="profile-details">
                        <h2>À propos de moi</h2>
                        <div class="profile-info">À propos: <?=htmlentities($userInfo['biography']);?></div>
                    
                        <h2>Informations Personnelles</h2>
                        <div class="profile-info"><span>Sexe</span> <span><?=htmlentities($userInfo['gender']);?></span></div>
                        <div class="profile-info"><span>Date de naissance</span> <span><?=htmlentities($userInfo['birthdate']);?></span></div>
                        <div class="profile-info"><span>Localisation</span> <span><?=htmlentities($userInfo['user_location']);?></span></div>
                        
                        <h2>Style de Vie</h2>
                        <div class="profile-info"><span>Relation</span> <span><?=htmlentities($userInfo['relation']);?></span></div>
                        <div class="profile-info"><span>Travail</span> <span><?=htmlentities($userInfo['job']);?></span></div>
                        <div class="profile-info"><span>Fumeur</span> <span><?=htmlentities($userInfo['smoking']);?></span></div>
                        
                        <h2>Caractéristiques Physiques</h2>
                        <div class="profile-info"><span>Taille</span> <span><?=htmlentities($userInfo['user_size']);?> cm</span></div>
                        <div class="profile-info"><span>Poids</span> <span><?=htmlentities($userInfo['user_weight']);?> kg</span></div>
                        <div class="profile-info"><span>Couleur des yeux</span> <span><?=htmlentities($userInfo['eye_color']);?></span></div>
                        <div class="profile-info"><span>Couleur des cheveux</span> <span><?=htmlentities($userInfo['hair_color']);?></span></div>
                        
                    </div>
                </div>
            <?php else: ?>
                <p>Les informations de profil ne sont pas disponibles.</p>
            <?php endif; ?>
        </div>        
    </section>
    </body>
</html>