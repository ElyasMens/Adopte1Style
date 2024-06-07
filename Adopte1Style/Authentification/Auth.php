<?php 
    
    function session_opened(){
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    function user_connected(){
        session_opened();
           // Vérifie si la session existe et si sa valeur est "user" ou "subscriber" ou "admin"
        if (isset($_SESSION['module']) && ($_SESSION['module'] === 'user' || $_SESSION['module'] === 'subscriber' || $_SESSION['module'] === 'admin')) {
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

    function is_subscriber(){
        session_opened();
        if (isset($_SESSION['module']) && $_SESSION['module'] === 'user' ) {
            header('Location: ../Redirection/Subscription.php');
        } 
    }
?>