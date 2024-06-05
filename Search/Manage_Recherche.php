<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
/*-------- RECHERCHE --------*/
function Show_LastUsers(){
    $connexion = Connexion();
    $actual_user = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    
    // 20 derniers utilisateurs inscrits
    $query = "SELECT * FROM users_info WHERE username != :actual_user ORDER BY id DESC LIMIT 20";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':actual_user', $actual_user, PDO::PARAM_STR);
    $stmt->execute();

    echo "<ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $user_pp = pp_path($row['username']);
        echo "<li class='user-info show-user' data-username='{$row['username']}' data-birthdate='{$row['birthdate']}' data-location='{$row['user_location']}' data-gender='{$row['gender']}' data-job='{$row['job']}' data-size='{$row['user_size']}'>
                <img src='{$user_pp}' alt='Profile Picture'>
                <div class='user-info-content'></div>
                <div class='user-info-option'>
                    <a href='../Profile/Profil.php' onclick='Set_a_Cookie(\"profile\",\"{$row['username']}\")'><span class='material-symbols-outlined'>Account_Circle</span></a>
                    <a href='../Messaging/Messages.php' onclick='Set_a_Cookie(\"messages\",\"{$row['username']}\",\"{$user_pp}\")'><span class='material-symbols-outlined'>Chat_Bubble</span></a>    
                </div> 
            </li>";
    } 
    
    // Si + de 20 utilisateurs
    $query_hidden = "SELECT * FROM users_info WHERE username != :actual_user ORDER BY id DESC LIMIT 20, 20"; // Corrected limit clause for the next 20 users
    $stmt_hidden = $connexion->prepare($query_hidden);
    $stmt_hidden->bindParam(':actual_user', $actual_user, PDO::PARAM_STR);
    $stmt_hidden->execute();
    
    while ($hidden_row = $stmt_hidden->fetch(PDO::FETCH_ASSOC)) {
        $user_pp = pp_path($hidden_row['username']);
        echo "<li class='user-info hide-user' data-username='{$hidden_row['username']}' data-birthdate='{$hidden_row['birthdate']}' data-location='{$hidden_row['user_location']}' data-gender='{$hidden_row['gender']}' data-job='{$hidden_row['job']}' data-size='{$hidden_row['user_size']}'>
                <img src='{$user_pp}' alt='Profile Picture'>
                <div class='user-info-content'></div> 
                <div class='user-info-option'>
                    <a href='../Profile/Profil.php' onclick='Set_a_Cookie(\"profile\",\"{$hidden_row['username']}\")'><span class='material-symbols-outlined'>Account_Circle</span></a>
                    <a href='../Messaging/Messages.php' onclick='Set_a_Cookie(\"messages\",\"{$hidden_row['username']}\",\"{$user_pp}\")'><span class='material-symbols-outlined'>Chat_Bubble</span></a>  
                </div> 
            </li>";
    }
    echo "</ul>";
}
?>