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
        <script src="../Assets/JavaScript/Dashboard.js"></script>
        <script src="../Assets/JavaScript/Messages.js"></script>
        <meta http-equiv="refresh" content="">
    </head>
    <body> 
    <section class="dashboard-section">
        <div class="main-container">
        <div class="rd-block"> <!--rd pour report/block -->
                <div class="rd-block-content">
                    <button class="confirm">Valider</button><button onclick="Display_None()">Annuler</button>
                </div>
            </div>
        <div class="user-table">
            <span><h2>Utilisateurs inscrits</h2><input id="search-bar" type="text" name="search" placeholder="Recherche un utilisateur..." maxlength="20"></span>
            <div>
                <?php require_once 'UserTable.php'; ?>
            </div>
        </div>
        <div class="report-table">
            <h2>Signalements (id - utilisateur signalé - signalé par - raison - contenu du message)</h2>
            <div>
                <?php require_once 'ReportedUserTable.php'; ?>
            </div>
        </div>         
    </section>
    </body>
</html>
