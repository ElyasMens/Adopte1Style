<?php
$admin = 0;
$utilisateur = 0;
$abonné = 0;
$cpt = 0;
$erreur = 0;

$username = $_POST['username'];
$password = $_POST['password'];

$file = fopen("../user.txt","r");

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
    session_start();
    $_SESSION['connected']='guest';
    header('Location: http://localhost:8080/WelcomePage/Index.php');
    exit();
}
elseif($utilisateur === 1){
    session_start();
    $_SESSION['connected']="user";
    header('Location: http://localhost:8080/HomePage/Home.php');
    exit();
}
elseif($abonné === 1){
    header('Location: page_abonné.php');
    exit();
}
else{
    header('Location: page_admin.php');
    exit();
    // mode admin , faut qu'on choisisse sur quel page on se dirige
}
?>