<?php
    require '../Assets/SQL/FunctionsSQL.php';
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if (isset($_SESSION['username']) && isset($_COOKIE['contact_username'])) {
        $username = $_SESSION['username'];
        $contact_username = $_COOKIE['contact_username'];

        $connexion = Connexion();
        if (!$connexion) {
            die("Erreur de connexion à la base de données");
        }

        $query = "SELECT * FROM messaging 
                  WHERE (sender = :username AND receiver = :contact_username) 
                     OR (sender = :contact_username AND receiver = :username)";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':username', $username); 
        $stmt->bindValue(':contact_username', $contact_username); 

        if ($stmt->execute()) {
            $del = "Delete";
            $rep = "Report";

            // Chargement des messages
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
                    echo '<div class="message contact-message">';
                    echo '<div class="message-content">'. htmlentities($message) .'</div>';
                    echo '<span onclick="Display_True(\''. htmlentities($rep) .'\', '. htmlentities($id) .')" class="material-symbols-outlined message-option">Report</span>';
                    echo '</div>';
                }
            }
        } else {
            echo "Erreur: " . implode(", ", $stmt->errorInfo());
        }
    } 
?>
