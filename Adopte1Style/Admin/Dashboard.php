<?php 
    require '../Assets/Elements/Header.php';
    require '../Assets/Elements/Sidebar.php';
    if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
    }
    $connexion = Connexion();
    $userInfo = User_InfoExists($username, $connexion);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adopte1Style | Dashboard</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Assets/CSS/Dashboard.css">
        <script src="../Assets/JavaScript/Messages.js"></script>
        <script src="../Assets/JavaScript/Dashboard.js"></script>
    </head>
    <body> 
    <section class="dashboard-section">
        <div class="main-container">
        <div class="rd-block"> 
                <div class="rd-block-content">
                    <button class="confirm"></button><button onclick="Display_None()"></button>
                </div>
            </div>
        <div class="user-table">
            <span><h2>Utilisateurs inscrits</h2><input id="search-bar" type="text" name="search" placeholder="Recherche un utilisateur..." maxlength="20"></span>
            <div>
                <?php require_once 'UserTable.php'; ?>
            </div>
        </div>
        <div class="report-table">
            <h2 style="font-size:20px">Signalements (id - utilisateur signalé - signalé par - raison - id du message - contenu)</h2>
            <div>
                <?php require_once 'ReportedUserTable.php'; ?>
            </div>
        </div>         
    </section>
    </body>
</html>
