<?php
function signUp($pseudo, $password) {
    $file_users = '../identifier.txt';

    // Vérifie si le pseudo existe déjà dans le fichier des utilisateurs
    $users = file($file_users, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($existing_pseudo, $existing_password, $existing_category) = explode(';', $user);
        if ($existing_pseudo === $pseudo) {
            return "Erreur : Ce pseudo est déjà utilisé.";
        }
    }

    // Le pseudo n'existe pas, ajoute le nouvel utilisateur 
    $new_user = "$pseudo;$password;user" . PHP_EOL;
    if (file_put_contents($file_users, $new_user, FILE_APPEND | LOCK_EX) === false) {
        return "Erreur lors de l'inscription de l'utilisateur.";
    }

    return "Inscription réussie !";
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs saisies par l'utilisateur depuis le formulaire
    $pseudo = $_POST['identifier'];
    $password = $_POST['password'];

    // Appeler la fonction signUp avec les informations récupérées depuis le formulaire
    $resultat = signUp($pseudo, $password);

    // Afficher le résultat de l'inscription
    echo $resultat;
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}
?>