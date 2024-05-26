<?php 
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
    require '../Assets/SQL/FunctionsSQL.php';

function signUp($real_name, $email, $username, $password, $connexion) {
    if (UserExists($username, $connexion)) {
        // Le nom d'utilisateur existe
        setcookie('ERROR_MESSAGE_SIGNUP','NOM D UTILISATEUR DÉJA UTILISÉ.', time()+2, '/');
        header('Location: ../Index.php');
        exit();
    } else {
        // Le nom d'utilisateur n'existe pas
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (real_name, email, username, user_password) VALUES (:real_name, :email, :username, :user_password)";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':real_name', $username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':user_password', $hashed_password, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 0;
        } else {
            return 1 .  $stmt->errorInfo()[2];
        }
    }
}



//Vérifie si les valeurs saisies existent
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['name'])){
    // Vérifie si le formulaire d'inscription a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email  = $_POST['email'];
        $real_name = $_POST['name'];
        // Base de donnée et son serveur pour la connexion
        $connexion = Connexion();
        // Vérifier si l'inscription a été réussie
        $resultat = signUp($real_name, $email, $username, $password, $connexion);
        if ($resultat === 0) {
            $_SESSION['connected'] = 'user';
            setcookie('user', $username, time()+60*60, '/');
            header("Location: ../Profile/Modifier%20Profil.php");
            exit();
        }else {
            // Afficher un message d'erreur si l'inscription a échoué
            echo "Problème lors de l'inscription";
        }
    }else {
        echo "Erreur : Le formulaire n'a pas été soumis.";
    }
}else {
    $erreur = "Identifiants incorrects";
}
?>