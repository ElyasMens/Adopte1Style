<?php
session_start();
session_destroy();
$username = $_COOKIE["user"];
setcookie('user', $username, time()-60*60, '/');
header("Location: ../../WelcomePage/Index.php");
exit();
?>
