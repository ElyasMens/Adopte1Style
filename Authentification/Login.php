<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin = 'admin';
    $user = 'user';
    $subscriber = 'subscriber';
    $error = 'error';
    require '../Assets/SQL/FunctionsSQL.php';
    $result = Login($username,$password,Connexion());
    if($result === $error){
        setcookie('ERROR_MESSAGE_LOGIN','IDENTIFIANT OU MOT DE PASSE INCORRECT.', time()+2, '/');
        header('Location: ../Index.php');
        exit();
    }
    elseif($result === $user){
        session_start();
        $_SESSION['connected']='user';
        setcookie($user, $username, time()+60*60, '/');
        header('Location: ../Home/Accueil.php');
        exit();
    }
    elseif($result === $subscriber){
        session_start();
        $_SESSION['connected']=$subscriber;
        header('Location: ../Home/Accueil.php');
        exit();
    }
    else{
        session_start();
        $_SESSION['connected']=$admin;
        header('Location: page_admin.php');
        exit();
        // mode admin , faut qu'on choisisse sur quel page on se dirige
    }
?>

