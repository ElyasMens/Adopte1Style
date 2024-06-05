<?php 
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once '../Assets/SQL/FunctionsSQL.php';
    $connexion = Connexion();
    // 20 derniers utilisateurs inscrits
    $query = "SELECT * FROM users_reported";
    $stmt = $connexion->prepare($query);
    $stmt->execute();

    echo "<ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $user_pp = pp_path($row['user_reported']);
        echo "<li class='report-info show-user' data-id='{$row['report_id']}' data-user_reported='{$row['user_reported']}' data-reported_by='{$row['reported_by']}' data-reason='{$row['reason']}' data-message_id='{$row['message_id']}' data-message_content='{$row['message_content']}'>
                <div class='report-info-content'></div>
                <div class='report-info-option'>  
                    <span class='delete-option' onclick='Remove_Report(\"{$row['report_id']}\")'><span class='material-symbols-outlined'>delete</span></span>
                </div>
            </li>";
    } 
    echo "</ul>";


?>