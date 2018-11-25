<?php
    function setUserCookies($username,$userid,$isadmin){
        setcookie('datingsite_username',$username,time()+3600);
        setcookie('datingsite_userid',$userid,time()+3600);
        setcookie('datingsite_isadmin',$isadmin,time()+3600);
    }

    function clearUserCookies(){
        setcookie('datingsite_username','',time()-3600);
        setcookie('datingsite_userid','',time()-3600);
        setcookie('datingsite_isadmin','',time()-3600);
    }

    function getCookieUsername(){
        if(isset($_COOKIE['datingsite_username'])) {
           return $_COOKIE['datingsite_username'];
        }
        return null;
    }

    function getCookieUserid(){
        if(isset($_COOKIE['datingsite_userid'])){
            return $_COOKIE['datingsite_userid'];
        }
        return null;
    }

    function getCookieIsAdmin(){
        if(isset($_COOKIE['datingsite_isadmin'])){
            return $_COOKIE['datingsite_isadmin'];
        }
        return null;
    }
?>