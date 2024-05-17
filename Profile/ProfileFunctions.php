<?php
if(isset($_COOKIE['user'])){
    $username = $_COOKIE['user'];
}
function saveProfile($username, $sexe, $date_naissance, $profession, $lieu_residence, $situation_amoureuse, $taille, $poids, $couleur_yeux, $couleur_cheveux, $biographie, $fumeur, $photos) {
    $file_profiles = 'profiles.txt';
    
    // Enregistrer les photos
    $photo_paths = [];
    foreach ($photos['name'] as $key => $photo_name) {
        $photo_tmp = $photos['tmp_name'][$key];
        $photo_dest = "../DataBase/ProfilePic/" . basename($photo_name); 
        if (move_uploaded_file($photo_tmp, $photo_dest)) {
            $photo_paths[] = $photo_dest;
        } else {
            return "Erreur lors du téléchargement de la photo : " . $photo_name . " - " . error_get_last()['message'];
        }
    }

    // Créer une chaîne avec les chemins des photos
    $photos_str = implode(',', $photo_paths);

    // Enregistrer le profil dans un format approprié dans le fichier texte
    $profile_data = "$username;$sexe;$date_naissance;$profession;$lieu_residence;$situation_amoureuse;$taille;$poids;$couleur_yeux;$couleur_cheveux;$biographie;$fumeur;$photos_str" . PHP_EOL;

    // Ajouter le profil à la fin du fichier
    if (file_put_contents($file_profiles, $profile_data, FILE_APPEND | LOCK_EX) === false) {
        return "Erreur lors de l'enregistrement du profil : " . error_get_last()['message'];
    }

    return "Profil enregistré avec succès !";
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Appeler la fonction saveProfile avec les informations récupérées depuis le formulaire
    $resultat = saveProfile($username, $sexe, $date_naissance, $profession, $lieu_residence, $situation_amoureuse, $taille, $poids, $couleur_yeux, $couleur_cheveux, $biographie,$fumeur, $photos);

    // Afficher le résultat de l'enregistrement du profil
    echo $resultat;
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}
?>
