<?php
    session_start();
    $_SESSION['login_status']=false;
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
    header("location:login.php");
?>