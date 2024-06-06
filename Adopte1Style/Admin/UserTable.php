<?php 
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once "../Assets/SQL/FunctionsSQL.php";

    $connexion = Connexion();
    $actual_user = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    
    // 20 derniers utilisateurs inscrits
    $query = "SELECT * FROM users WHERE username != :actual_user";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':actual_user', $actual_user, PDO::PARAM_STR);
    $stmt->execute();

    echo "<ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $user_pp = pp_path($row['username']);
        echo "<li class='user-info ' data-id='{$row['id']}' data-realname='{$row['real_name']}' data-username='{$row['username']}' data-email='{$row['email']}'>
                <img class ='user-info-img'src='{$user_pp}' alt='Profile Picture'>
                <div class='user-info-content'></div>
                <div class='user-info-option'>
                    <a href='../Profile/Profil.php' onclick='Set_a_Cookie(\"profile\",\"{$row['username']}\")'><span class='material-symbols-outlined'>Account_Circle</span></a>
                    <a href='../Messaging/Messages.php' onclick='Set_a_Cookie(\"messages\",\"{$row['username']}\",\"{$user_pp}\")'><span class='material-symbols-outlined'>Chat_Bubble</span></a>    
                    <span class='ban-option' onclick='confirm(\"BanUser\",\"{$row['username']}\", \"{$row['email']}\")'><span class='material-symbols-outlined'>person_remove</span></span>
                </div> 
            </li>";
    } 
    echo "</ul>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'Delete_User') {
            if (isset($_POST['username']) && isset($_POST['email'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $connexion = Connexion();
                $query = "INSERT INTO users_banned (username, email) VALUES (:username, :email)";
                $stmt = $connexion->prepare($query);
                $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                if($stmt->execute()){
                    $tables = ['users', 'users_info'];
                    foreach ($tables as $table) {
                        $query = "DELETE FROM $table WHERE username = :username";
                        $stmt = $connexion->prepare($query);
                        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                        $stmt->execute();
                    }

                    //suppresion des messages en lien avec l'utilisateur
                    $query = "DELETE FROM messaging WHERE sender = :username OR receiver = :username";
                    $stmt = $connexion->prepare($query);
                    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                    $stmt->execute();

                    // Supprimer des signalements en lien avec l'utilisateur
                    $query = "DELETE FROM users_reported WHERE user_reported = :username OR reported_by = :username";
                    $stmt = $connexion->prepare($query);
                    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                    $stmt->execute();
                    exit();
                }
            } 
        }
    }
}

?>