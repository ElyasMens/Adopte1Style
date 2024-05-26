<?php
if (isset($_COOKIE['user'])) {
    $username = $_COOKIE['user'];
}
require '../Assets/SQL/FunctionsSQL.php';

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

        // Extraire l'extension du fichier
        $extension = pathinfo($photo_name, PATHINFO_EXTENSION);

        // Construire le nouveau nom de fichier
        $photo_dest = $upload_dir . $username . "_pp." . $extension;

        if (move_uploaded_file($photo_tmp, $photo_dest)) { 
            $photo_paths[] = $photo_dest;
        } else {
            return "../Assets/Images/default.jpg";
        }
    }

    // Créer une chaîne avec les chemins des photos
    $photos_str = implode(',', $photo_paths);
    return $photos_str;
}



// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $result = User_InfoExists($username, $connexion);
    if($result){
        UpdateProfile($connexion, $result['id'], $username, $sexe, $date_naissance, $profession, $lieu_residence, $situation_amoureuse, $taille, $poids, $couleur_yeux, $couleur_cheveux, $biographie, $fumeur, $photo_for_profile);
    }else {
        SaveProfile($connexion, $username, $sexe, $date_naissance, $profession, $lieu_residence, $situation_amoureuse, $taille, $poids, $couleur_yeux, $couleur_cheveux, $biographie, $fumeur, $photo_for_profile);
    }      

    // Redirection vers la page d'accueil
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}
?>
