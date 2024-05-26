<?php
    require '../Assets/SQL/FunctionsSQL.php';
    if(isset($_COOKIE['user'])&&isset($_COOKIE['contact_username'])){
    $username = $_COOKIE['user'];
    $contact_username = $_COOKIE['contact_username'];

    $connexion = Connexion();
    $query = "SELECT * FROM messaging 
              WHERE (sender = :username AND receiver = :contact_username) 
                 OR (sender = :contact_username AND receiver = :username)";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':username', $username); 
    $stmt->bindValue(':contact_username', $contact_username); 
    $stmt->execute();

    $del = "Delete";
    $rep = "Report";
    //Chargement des messages
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $message = $row['message_content'];
        $sender = $row['sender'];
        $time = $row['sent_at'];
        $id = $row['id'];
        
        if ($sender == $username) {
            echo '<div class="message own-message">';
            echo '<div class="message-content">'. htmlentities($message) .'</div>';
            echo '<span onclick="Display_True(\''. htmlentities($del) .'\', '. htmlentities($id) .')" class="material-symbols-outlined message-option">Delete</span>';
            echo '</div>';
        } elseif ($sender == $contact_username){
            echo '<div class="message">';
            echo '<span onclick="Display_True(\''. htmlentities($rep) .'\', '. htmlentities($id) .')" class="material-symbols-outlined message-option">Report</span>';
            echo '<div class="message-content">'. htmlentities($message) .'</div>';
            echo '</div>';
        }
    }
}
?>
