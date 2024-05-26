<?php 
    
    function session_opened(){
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    function user_connected(){
        session_opened();
           // Vérifie si la session existe et si sa valeur est "user" ou "subscriber" ou "admin"
        if (isset($_SESSION['connected']) && isset($_COOKIE['user']) && ($_SESSION['connected'] === 'user' || $_SESSION['connected'] === 'subscriber' || $_SESSION['connected'] === 'admin')) {
            return true; 
        } else {
            return false;
        }
    }

    function force_user_connexion(){
        if(!user_connected()){
            require "Disconnect.php";
        }
    }
?>