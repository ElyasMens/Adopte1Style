<?php 
    require_once '../Assets/Elements/Header.php';
    require_once '../Assets/Elements/Sidebar.php';
    is_subscriber();
    function loadProfileViewTable(){
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : " ";
        $connexion = Connexion();
        $query = "SELECT * FROM profile_view WHERE user_visited = :username";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        echo "<ul>";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $user_pp = pp_path($row['user_visitor']);
            echo "<li class='user-info' data-user_visitor='{$row['user_visitor']}'>
                <img class ='user-info-img'src='{$user_pp}' alt='Profile Picture'>
                <div class='user-info-content'>{$row['user_visitor']} a visité votre profil.</div>
                <div class='user-info-option'>
                    <a href='../Profile/Profil.php' onclick='Set_a_Cookie(\"profile\",\"{$row['user_visitor']}\")'><span class='material-symbols-outlined'>Account_Circle</span></a>
                    <a href='../Messaging/Messages.php' onclick='Set_a_Cookie(\"messages\",\"{$row['user_visitor']}\",\"{$user_pp}\")'><span class='material-symbols-outlined'>Chat_Bubble</span></a>    
                 </div> 
            </li>";
        }
        echo "</ul>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adopte1Style | Accueil</title>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1">
        <link rel="stylesheet" href="../Assets/CSS/ProfileView.css">
    </head>
    <body> 
    <section class="ProfileView-section">
        <div class="main-container">
            <?php loadProfileViewTable();?>
        </div>        
    </section>
    </body>
</html>