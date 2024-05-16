<?php 
    $username = $_COOKIE['user'];
?>

<div id="ChatBox-Container">
    <?php 
        $file = fopen("../../DataBase/Messaging.txt","r");

        while(!feof($file)){
        $line = fgets($file);
        $data = explode(";",$line);
        }
    ?>
</div>
