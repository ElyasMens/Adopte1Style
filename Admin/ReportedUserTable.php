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
        echo "<li class='report-info' data-id='{$row['report_id']}' data-user_reported='{$row['user_reported']}' data-reported_by='{$row['reported_by']}' data-reason='{$row['reason']}' data-message_id='{$row['message_id']}' data-message_content='{$row['message_content']}'>
                <div class='report-info-content'></div>
                <div class='report-info-option'>  
                    <span class='delete-option' onclick='confirm(\"DeleteReport\",\"{$row['report_id']}\",\"{$row['message_id']}\")'><span class='material-symbols-outlined'>delete</span></span>
                </div>
            </li>";
    } 
    echo "</ul>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action']) && $_POST['action'] === 'Delete_ReportAndMessage') {
            if (isset($_POST['reportId']) && isset($_POST['messageId'])) {
                $reportId = $_POST['reportId'];
                $messageId = $_POST['messageId'];
               
    
                $connexion = Connexion();
                $query = "DELETE FROM users_reported WHERE report_id = :report_id";
                $stmt = $connexion->prepare($query);
                $stmt->bindValue(':report_id', $reportId, PDO::PARAM_INT);
                $stmt->execute();
                   
                       
                    Delete_Message($messageId);
                    
                    $response = ['success' => true];
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit();
                }
            } else {
                $response = ['success' => false, 'message' => 'ID du signalement, ID du message ou choix de suppression requis.'];
                header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
    
    
    
?>