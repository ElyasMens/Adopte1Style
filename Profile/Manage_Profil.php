<?php
 if (session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../Assets/SQL/FunctionsSQL.php';

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
        header('Location: ../Home/Accueil.php');
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
        header('Location: ../Home/Accueil.php');
        exit();
    }
}

function SavePhotoProfile($username, $photos) {
    // Enregistrer les photos
    $photo_paths = [];
    $upload_dir = "../Assets/DataBase/Users_Photo/";

    // Vérifiez si le répertoire de destination existe, sinon créez-le
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    foreach ($photos['name'] as $key => $photo_name) {
        $photo_tmp = $photos['tmp_name'][$key];

        $extension = pathinfo($photo_name, PATHINFO_EXTENSION);

        $photo_dest = $upload_dir . $username . "_pp." . $extension;

        if (move_uploaded_file($photo_tmp, $photo_dest)) { 
            $photo_paths[] = $photo_dest;
        } else {
            return "../Assets/Images/default.jpg";
        }
    }


    $photos_str = implode(',', $photo_paths);
    return $photos_str;
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['user']; 
    if (!isset($username)) {
        echo "Erreur : Utilisateur non authentifié.";
        exit();
    }

    // Récupérer les valeurs saisies par l'utilisateur depuis le formulaire
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    $profession = $_POST['profession'];
    $lieu_residence = $_POST['lieu_residence'];
    $situation_amoureuse = $_POST['situation_amoureuse'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $couleur_yeux = $_POST['couleur_yeux'];
    $couleur_cheveux = $_POST['couleur_cheveux'];
    $biographie = $_POST['biographie'];
    $fumeur = $_POST['fumeur'];
    $photos = $_FILES['photos'];
    //stockage de l'image et récupération du chemin
    $photo_for_profile = SavePhotoProfile($username, $photos);

    $connexion = Connexion();
    $result = UserExists($username, $connexion);
    if($result){
        SaveProfile($connexion, $result['id'], $username, $sexe, $date_naissance, $profession, $lieu_residence, $situation_amoureuse, $taille, $poids, $couleur_yeux, $couleur_cheveux, $biographie, $fumeur, $photo_for_profile);
    }else {
        $result2 = UserInfo_Exists($username, $connexion);
        if($result2){
            UpdateProfile($connexion, $result2['id'], $username, $sexe, $date_naissance, $profession, $lieu_residence, $situation_amoureuse, $taille, $poids, $couleur_yeux, $couleur_cheveux, $biographie, $fumeur, $photo_for_profile);
        }      
    }
    // Redirection vers la page d'accueil
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}
?>
