<?php
    session_start();
    session_destroy();
    $delete_cookies = array('contact_username', 'user_selected');
    foreach ($delete_cookies as $cookie_name) {
        if (isset($_COOKIE[$cookie_name])) {
            setcookie($cookie_name, '', time() - 3600, '/');
        }
    }
    header("Location: ../Index.php");
    exit();
?>