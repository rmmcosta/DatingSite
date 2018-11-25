<?php
    require_once('cookies.php');
    session_start();
    function isLogged(){
        if(null !== getCookieUsername() && null !== getCookieUserid() && null !== getCookieIsAdmin()){
            setUserSession(getCookieUsername(), getCookieUserid(), getCookieIsAdmin());
        }
        return isset($_SESSION['userid']);
    }

    function setUserSession($username, $userid, $isadmin){
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
        $_SESSION['isadmin'] = $isadmin;
    }

    function getSessionUsername(){
        return $_SESSION['username'];
    }

    function getSessionUserid(){
        return $_SESSION['userid'];
    }

    function isAdmin(){
        return $_SESSION['isadmin'];
    }
?>