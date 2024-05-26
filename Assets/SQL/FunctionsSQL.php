<?php 
function pp_path($username): string {
    $pp_folder = '../Assets/DataBase/Users_Photo/';
    $extensions = ['jpg', 'png', 'gif', 'jpeg', 'webp'];  // Ajoutez d'autres extensions si nécessaire
    foreach ($extensions as $ext) {
        $filePath = $pp_folder . htmlentities($username) . '_pp.' . $ext;
        if (file_exists($filePath)) {
            return htmlentities($filePath);
        }
    }
    // Retourne une chaîne vide si aucune image de profil n'est trouvée
    return "../Assets/DataBase/Users_Photo/default.jpg";
} 


/*-------- CONNEXION A LA BASE DE DONNEES--------*/
function Connexion(){
    // Base de donnée et son serveur pour la connexion
    $servername = "127.0.0.1";
    $dbname = "aus_db";
    $dbuser = "root";
    // Connexion à la base de données
    try{
        $connexion = new PDO("mysql:host=$servername;dbname=$dbname;login=$dbuser;");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    }catch(PDOException $e){
        echo "Error : " .$e->getMessage();
    }
}

function UserExists($username, $connexion){
    //Vérifie si le pseudo existe déjà dans la table users
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':username',$username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function User_InfoExists($username, $connexion){
    //Vérifie si le pseudo existe déjà dans la table users_info
    $query = "SELECT * FROM users_info WHERE username = :username";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':username',$username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


/*-------- CONNEXION --------*/
function Login($username, $password, $connexion){
    $error = 'error';
    $result = UserExists($username, $connexion);
    if($result){
        $hashed_password = $result['user_password'];
        echo $result['user_password'];
        if(password_verify($password, $hashed_password)){
            //MDP correct
            return $result['module'];
            //echo "MDP Correct.<br>";
            //echo $password . $hashed_password;
        }else{
            //MDP incorrect
            return $error;
            //echo "MDP Incorrect. <br>";
            //echo $password . $hashed_password;
        }
    }else{
        //Utilisateur non trouvé
        return $error;
    }
}
/*-------- SAUVEGARDE DU PROFIL --------*/
function SaveProfile($connexion, $user_id, $username, $gender, $birthdate, $job, $user_location, $relation, $user_size, $user_weight, $eye_color, $hair_color, $biography, $smoking, $photo_for_profile){


    $query = "INSERT INTO users_info (id, username, gender, birthdate, job, user_location, relation, user_size, user_weight, eye_color, hair_color, biography, smoking, user_photo) 
                VALUES (:id, :username, :gender, :birthdate, :job, :user_location, :relation, :user_size, :user_weight, :eye_color, :hair_color, :biography, :smoking, :photo_for_profile)";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
    $stmt->bindValue(':job', $job, PDO::PARAM_STR);
    $stmt->bindValue(':user_location', $user_location, PDO::PARAM_STR);
    $stmt->bindValue(':relation', $relation, PDO::PARAM_STR);
    $stmt->bindValue(':user_size', $user_size, PDO::PARAM_INT);
    $stmt->bindValue(':user_weight', $user_weight, PDO::PARAM_INT);
    $stmt->bindValue(':eye_color', $eye_color, PDO::PARAM_STR);
    $stmt->bindValue(':hair_color', $hair_color, PDO::PARAM_STR);
    $stmt->bindValue(':biography', $biography, PDO::PARAM_STR);
    $stmt->bindValue(':smoking', $smoking, PDO::PARAM_STR);
    $stmt->bindValue(':photo_for_profile', $photo_for_profile, PDO::PARAM_STR);
    if ($stmt->execute()) {
        header('Location: ../../Home/Accueil.php');
        exit();
    }
}

function UpdateProfile($connexion, $user_id, $username, $gender, $birthdate, $job, $user_location, $relation, $user_size, $user_weight, $eye_color, $hair_color, $biography, $smoking, $photo_for_profile) {


    $query = "UPDATE users_info SET gender = :gender, birthdate = :birthdate, job = :job, user_location = :user_location, relation = :relation, user_size = :user_size, user_weight = :user_weight, eye_color = :eye_color, hair_color = :hair_color, biography = :biography, smoking = :smoking, user_photo = :photo_for_profile
              WHERE id = :id AND username = :username";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
    $stmt->bindValue(':job', $job, PDO::PARAM_STR);
    $stmt->bindValue(':user_location', $user_location, PDO::PARAM_STR);
    $stmt->bindValue(':relation', $relation, PDO::PARAM_STR);
    $stmt->bindValue(':user_size', $user_size, PDO::PARAM_INT);
    $stmt->bindValue(':user_weight', $user_weight, PDO::PARAM_INT);
    $stmt->bindValue(':eye_color', $eye_color, PDO::PARAM_STR);
    $stmt->bindValue(':hair_color', $hair_color, PDO::PARAM_STR);
    $stmt->bindValue(':biography', $biography, PDO::PARAM_STR);
    $stmt->bindValue(':smoking', $smoking, PDO::PARAM_STR);
    $stmt->bindValue(':photo_for_profile', $photo_for_profile, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: ../../Home/Accueil.php');
        exit();
    }
}

/*-------- MESSAGERIE --------*/
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

function Send_Messages($username, $contact_username, $message) {
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
            } else {
                echo "Erreur lors du signalement du message";
            }
        }
    }
}
/*-------- RECHERCHE --------*/
function Show_LastUsers(){
    $connexion = Connexion();
    $actual_user = isset($_COOKIE['user']) ? $_COOKIE['user'] : "";
    
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