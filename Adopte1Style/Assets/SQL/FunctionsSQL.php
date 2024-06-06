<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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


?>