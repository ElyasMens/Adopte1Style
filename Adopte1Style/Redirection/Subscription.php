<?php

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../Assets/SQL/FunctionsSQL.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['action'] === 'Update_Module'){
        if ($_SESSION['module']!='subscriber'){
            $connexion = Connexion();
            if(updateUserToSubscriber($_SESSION['username'], $connexion)){
                $_SESSION['module'] = 'subscriber';
                $response['success'] = true;
                header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }else {
            $response['success'] = true;
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
    }
}

// fonction modifiant user en subscriber
function updateUserToSubscriber($username, $connexion) {
    $query = "UPDATE users SET module = 'subscriber' WHERE username = :username";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
    return $stmt->execute();  
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offre d'Abonnement - Site de Rencontre</title>
    <link rel="stylesheet" href="../Assets/CSS/Subscription.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../Assets/JavaScript/Subscription.js"></script>
</head>
<body>
    <div class="overlay">
        <div class="container">
            <h1>Offre d'Abonnement</h1>
            <p>Abonnez-vous maintenant et votre sapologue avec notre site de rencontre.</p>
            <button class="subscribe-btn" onclick="subscribeUser()">S'abonner Maintenant</button>
            <p class="details-toggle">Détail de l'offre</p>
            <div class="details-content">
                <p>En vous abonnant, vous pouvez communiquer avec tout le monde par message privé et voir qui a consulté votre profil</p>
            </div>
        </div>
    </div>
    <script src="../Assets/JavaScript/Subscription.js"></script>
</body>
</html>

