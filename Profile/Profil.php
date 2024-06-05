<?php 
    require '../Assets/Elements/Header.php';
    require '../Assets/Elements/Sidebar.php';
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if (isset($_COOKIE['user_selected'])){
        $username = $_COOKIE['user_selected'];
        $monnomamoi = $_SESSION['username'];
        //Pour la vue du profile
        $connexion = Connexion();
        $query = "SELECT * FROM profile_view WHERE user_visited = :user_visited and user_visitor = :user_visitor";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':user_visited', $username, PDO::PARAM_STR);
        $stmt->bindValue(':user_visitor', $monnomamoi, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result===false){
            $query = "INSERT INTO profile_view (user_visited,user_visitor) VALUES (:user_visited, :user_visitor)";
            $stmt = $connexion->prepare($query);
            $stmt->bindValue(':user_visited', $username, PDO::PARAM_STR);
            $stmt->bindValue(':user_visitor', $monnomamoi, PDO::PARAM_STR);
            $stmt->execute();
        }
        /*-----------------*/
        setcookie('user_selected', "", time() - 3600, "/");
    }else {
        $username = $_SESSION['username'];
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
        <div class="profile-content">
        <?php if($username == $_SESSION['username']): ?>
                        <div class="profile-actions">
                            <a href="Modifier Profil.php" class="btn-edit">Éditer le profil</a>
                        </div>
                        <?php else: ?>
                            <div class="profile-actions">
                            <a href="../Messaging/Messages.php" onclick="Set_a_Cookie('messages','<?= htmlentities($userInfo['username']);?>')" class="btn-message">Envoyer un message</a>
                        </div> 
                    <?php endif; ?>
            <?php if ($userInfo): ?>
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
