<?php
    /*-------- CONNEXION --------*/
    function Login($username, $password, $connexion){
    $error = 'error';
    $result = UserExists($username, $connexion);
    if($result){
        $hashed_password = $result['user_password'];
        echo $result['user_password'];
        if(password_verify($password, $hashed_password)){
            //MDP correct
            return $result['module'];
            //echo "MDP Correct.<br>";
            //echo $password . $hashed_password;
        }else{
            //MDP incorrect
            return $error;
            //echo "MDP Incorrect. <br>";
            //echo $password . $hashed_password;
        }
    }else{
        //Utilisateur non trouvé
        return $error;
    }
}

    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin = 'admin';
    $user = 'user';
    $subscriber = 'subscriber';
    $error = 'error';
    require '../Assets/SQL/FunctionsSQL.php';
    $result = Login($username,$password,Connexion());
    if($result === $error){
        setcookie('ERROR_MESSAGE_LOGIN','IDENTIFIANT OU MOT DE PASSE INCORRECT.', time()+60, '/');
        header('Location: ../Index.php');
        exit();
    }
    elseif($result === $user){
        session_start();
        $_SESSION['module']=$user;
        $_SESSION['username']=$username; 
        header('Location: ../Home/Accueil.php');
        exit();
    }
    elseif($result === $subscriber){
        session_start();
        $_SESSION['module']=$subscriber;
        $_SESSION['username']=$username; 
        header('Location: ../Home/Accueil.php');
        exit();
    }
    else{
        session_start();
        $_SESSION['module']=$admin;
        $_SESSION['username']=$username; 
        header('Location: ../Admin/Dashboard.php');
        exit();
    }
?>

