<?php
    require_once('cookies.php');
    session_start();
    function isLogged(){
        if(null !== getCookieUsername() && null !== getCookieUserid()){
            setUserSession(getCookieUsername(), getCookieUserid());
        }
        return isset($_SESSION['userid']);
    }

    function setUserSession($username, $userid){
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
    }

    function getSessionUsername(){
        return $_SESSION['username'];
    }
?>