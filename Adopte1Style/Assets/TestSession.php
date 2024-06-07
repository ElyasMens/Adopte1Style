<?php 
     session_start();
     $_SESSION['module']='user';
     header('Location: ../Home/Accueil.php');
     exit();
?>