<?php 
     session_start();
     $_SESSION['connected']='user';
     setcookie('user', 'user_name', time()+60*60, '/');
     header('Location: ../Home/Accueil.php');
     exit();
?>