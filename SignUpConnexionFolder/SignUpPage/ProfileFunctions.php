<?php
function saveProfile($pseudo, $sexe, $date_naissance) {
    $file_profiles = 'profiles.txt';

    // Vérifier si le fichier des profils existe
    if (!file_exists($file_profiles)) {
        // Créer le fichier s'il n'existe pas
        if (!touch($file_profiles)) {
            return "Erreur : Impossible de créer le fichier des profils.";
        }
    }

    // Enregistrer le profil dans un format approprié dans le fichier texte
    $profile_data = "$pseudo|$sexe|$date_naissance" . PHP_EOL;

    // Ajouter le profil à la fin du fichier
    if (file_put_contents($file_profiles, $profile_data, FILE_APPEND | LOCK_EX) === false) {
        return "Erreur lors de l'enregistrement du profil : " . error_get_last()['message'];
    }

    return "Profil enregistré avec succès !";
}


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs saisies par l'utilisateur depuis le formulaire
    $pseudo = $_POST['pseudo'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];

    // Appeler la fonction saveProfile avec les informations récupérées depuis le formulaire
    $resultat = saveProfile($pseudo, $sexe, $date_naissance);

    // Afficher le résultat de l'enregistrement du profil
    echo $resultat;
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}
?>

