<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
} 
    require_once '../Assets/SQL/FunctionsSQL.php';
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    $session = $_SESSION['module'];
    $user_pp = pp_path($username);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Assets/CSS/Sidebar.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="../Assets/Images/Logo.png" alt="profile-img">
                <h2>Adopte1Style</h2>
            </div>
                <ul class="sidebar-links">
                <?php if($session==="admin"): ?>
                    <li>
                        <a href="../../Admin/Dashboard.php"><span class="material-symbols-outlined">
                            Dashboard
                        </span>Dashboard</a>   
                    </li>
                <?php endif ?>
                    <li>
                        <a href="../../Home/Accueil.php"><span class="material-symbols-outlined">
                            Home
                        </span>Accueil</a>   
                    </li>
                    <li>
                        <a href="../../Search/Recherche.php"><span class="material-symbols-outlined">
                            Search
                        </span>Recherche</a>   
                    </li>
                    <li>
                        <a href="../../Notifications/ProfileView.php"><span class="material-symbols-outlined">
                        visibility
                        </span>Vue profil</a>   
                    </li>
                    <li>
                        <a href="../../Messaging/Messages.php"><span class="material-symbols-outlined">
                            Chat_Bubble
                        </span>Chat</a>   
                    </li>
                    <li>
                        <a href="../../Profile/Profil.php" ><span class="material-symbols-outlined">
                            Account_Circle
                        </span>Profil</a>   
                    </li>
                    <li>
                        <a href="#"><span class="material-symbols-outlined">
                            Help
                        </span>Aide</a>   
                    </li>
                    <li>
                        <a href="#"><span class="material-symbols-outlined">
                            Settings
                        </span>Paramètres</a>   
                    </li>
                    <li>
                        <a href="../../Authentification/Disconnect.php"><span class="material-symbols-outlined">
                            Logout
                        </span>Déconnexion</a>   
                    </li>
                </ul>
                <div class="user-account">
                    <div class="user-profile">
                        <img src="<?=htmlentities($user_pp);?>" alt="profile-img">
                        <div class="user-detail">
                            <h3><?=htmlentities($username)?></h3> 
                            <span><?=htmlentities($session)?></span> 
                        </div>
                    </div>
                </div>
        </aside>
    </body>
</html>
