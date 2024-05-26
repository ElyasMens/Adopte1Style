
<?php
require '../Assets/SQL/FunctionsSQL.php';


if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'Send_Messages') {
        if (isset($_POST['message'])) {
            if(empty($_COOKIE['user']) || empty($_COOKIE['contact_username'])){
                return;
            }
            $username = $_COOKIE['user'] ?? '';
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
            $id = $_POST['id'];
            $reason = $_POST['reason'];
            Report_Message($id, $reason);   
        }
    }
} else {
    echo "Aucune action spécifiée";
}
?>

