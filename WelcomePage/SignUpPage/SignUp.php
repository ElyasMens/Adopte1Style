<?php

function signUp($email, $password) {
    $file_users = 'users.txt';

    // Vérifier si l'adresse email existe déjà dans le fichier des utilisateurs
    $users = file($file_users, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($existing_email, $existing_password) = explode('|', $user);
        if ($existing_email === $email) {
            
            return "Erreur : Cette adresse email est déjà utilisée.";
        }
    }

    // L'adresse email n'existe pas, ajouter le nouvel utilisateur
    $new_user = "$email|$password" . PHP_EOL;
    if (file_put_contents($file_users, $new_user, FILE_APPEND | LOCK_EX) === false) {
        return "Erreur lors de l'inscription de l'utilisateur.";
    }

    return "Inscription réussie !";
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs saisies par l'utilisateur depuis le formulaire
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Appeler la fonction signUp avec les informations récupérées depuis le formulaire
    $resultat = signUp($email, $password);

    // Afficher le résultat de l'inscription
    echo $resultat;
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}

?>
