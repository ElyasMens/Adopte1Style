
<?php
require_once '../Assets/SQL/FunctionsSQL.php';
function User_Contacts($username, $connexion){
    $query = "SELECT DISTINCT CASE 
                WHEN sender = :username THEN receiver 
                WHEN receiver = :username THEN sender 
            END AS contact 
            FROM messaging 
            WHERE sender = :username OR receiver = :username";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function Block_User($username, $contact_username){
    $connexion = Connexion();
    $query = "INSERT INTO users_blocked (user_blocked, blocked_by) VALUES (:user_blocked, :blocked_by)";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':user_blocked',$contact_username);
    $stmt->bindValue(':blocked_by',$username);
    $stmt->execute();
}

/*-------- MESSAGERIE --------*/


function Send_Messages($username, $contact_username, $message) {
    session_start();
    $connexion = Connexion();
    $query = "INSERT INTO messaging (sender, receiver, message_content, sent_at) 
                VALUES (:username, :contact_username, :message_content, NOW())";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':contact_username', $contact_username, PDO::PARAM_STR);
    $stmt->bindValue(':message_content', $message, PDO::PARAM_STR);
    if ($stmt->execute()) {
        echo "Message envoyé";
    } else {
        echo "Erreur lors de l'envoi du message";
    }
}


function Delete_Message($id) {
    $connexion = Connexion();
    $query = "DELETE FROM messaging WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        echo "Message supprimé";
    } else {
        echo "Erreur lors de la suppression du message";
    }
}

function Report_Message($message_id, $reason) {
    $connexion = Connexion();
    //Si le message est déja signalé
    $query = "SELECT * FROM users_reported WHERE message_id = :message_id";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':message_id',$message_id, PDO::PARAM_INT);
    $stmt->execute();
    $already_reportded = $stmt->fetch(PDO::FETCH_ASSOC);
    //-----------
    if($already_reportded==NULL){
        $query = "SELECT * FROM messaging WHERE id = :id";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':id',$message_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            $user_reported = $result['sender'];
            $reported_by = $result['receiver'];
            $message_content = $result['message_content'];

            $query = "INSERT INTO users_reported (user_reported, reported_by, reason, message_id, message_content, report_date) 
                        VALUES (:user_reported, :reported_by, :reason, :message_id, :message_content, NOW())";
            $stmt = $connexion->prepare($query);
            $stmt->bindValue(':user_reported', $user_reported, PDO::PARAM_STR);
            $stmt->bindValue(':reported_by', $reported_by, PDO::PARAM_STR);
            $stmt->bindValue(':reason', $reason, PDO::PARAM_STR);
            $stmt->bindValue(':message_id', $message_id, PDO::PARAM_INT);
            $stmt->bindValue(':message_content', $message_content, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                echo "Message signalé";
                return;
            } else {
                echo "Erreur lors du signalement du message";
                return;
            }
        }
    }
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action === 'Send_Messages') {
        if (isset($_POST['message'])) {
            if(empty($_SESSION['username']) || empty($_COOKIE['contact_username'])){
                return;
            }
            $username = $_SESSION['username'] ?? '';
            $contact_username = $_COOKIE['contact_username'] ?? '';
            $message = $_POST['message'];
            Send_Messages($username, $contact_username, $message);
        } else {
            echo "Données manquantes pour envoyer le message";
        }
    } elseif ($action === 'Delete_Message') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            Delete_Message($id);
        }
    }elseif ($action === 'Report_Message') {
        if (isset($_POST['id']) && isset($_POST['reason'])) {
            Report_Message($_POST['id'], $_POST['reason']);   
        }
    }elseif ($action === 'Block_User') {
        if (isset($_POST['contact_username'])) {
            $username = $_SESSION['username'] ?? '';
            Block_User($username, $_POST['contact_username']);
            echo json_encode(['success' => true]);   
        }
    }
}
?>

