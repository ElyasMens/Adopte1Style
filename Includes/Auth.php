<?php 

    function session_opened():void{
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    function user_connected():bool{
        session_opened();
           // Vérifier si la session existe et si sa valeur est "user" ou "subscriber"
        if (isset($_SESSION['connected']) && ($_SESSION['connected'] === 'user' || $_SESSION['connected'] === 'subscriber')) {
        return true; // La session existe et est "user" ou "subscriber"
            } else {
        return false; // La session n'existe pas ou n'est pas "user" ou "subscriber"
        }
    }

    function force_user_connexion(): void {
        if(!user_connected()){
            header('Location: ../WelcomePage/Index.php');
            echo "<p>Clown.<p>";
        }
    }
?>