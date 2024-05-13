<?php 
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

function signUp($pseudo, $password) {
    $file_users = '../user.txt';

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



//Vérifie si les valeurs saisies existent
if (!empty($_POST['username']) && !empty($_POST['password'])){
    // Vérifier si le formulaire d'inscription a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $pseudo = $_POST['username'];
        $password = $_POST['password'];

        // Vérifier si l'inscription a été réussie
        $resultat = signUp($pseudo, $password);

        if ($resultat === "Inscription réussie !") {
            $_SESSION['connected'] = 'user';
            header("Location: http://localhost:8080/Profile/CreateProfile.php");
            exit;
        } else {
            // Afficher un message d'erreur si l'inscription a échoué
            echo $resultat;
        }
    } else {
        echo "Erreur : Le formulaire n'a pas été soumis.";
    }
} else {
    $erreur = "Identifiants incorrects";
}
?>