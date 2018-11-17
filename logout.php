<?php
    require_once('session.php');
    $_SESSION = array();
    if(isset($_SESSION[session_name()])){
        setcookies(session_name(),'',time()-3600);
    }
    clearUserCookies();
    session_destroy();
    header('Location:index.php');
?>