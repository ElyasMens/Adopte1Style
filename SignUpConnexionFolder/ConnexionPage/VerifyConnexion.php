<?php
session_start();
$admin = 0;
$utilisateur = 0;
$abonné = 0;
$cpt = 0;
$erreur = 0;

$username = $_POST['identifier'];
$password = $_POST['password'];

$file = fopen("../identifier.txt","r");

while(!feof($file)){
$line = fgets($file);
$data = explode(";",$line);

if ( $data[0] === $username && $data[1] === $password) {
    if(trim($data[2]) === "user"){
        $utilisateur++;  
    }
    if(trim($data[2]) === "subscriber"){
        $abonné++;  
    }
    else{
        $admin++;
    }

}
else{
   $erreur++; 
} 
$cpt++;
}


if($erreur === $cpt){
    $_SESSION['error'] = 'Login ou mot de passe incorrect';
}
elseif($utilisateur === 1){
    header('Location: page_user.php');
}
elseif($abonné === 1){
    header('Location: page_abonné.php');
    
}
else{
    header('Location: page_admin.php');
    // mode admin , faut qu'on choisisse sur quel page on se dirige
}
?>