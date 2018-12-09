<?php
    $_title = 'Mismatch';
    include_once('header.php');
    include_once('menu.php');
    require_once('questionairecs.php');
    require_once('session.php');
    require_once('mismatchcs.php');

    if(getResponsesWithoutResponse(getSessionUserid()) > 0) {
        echo 'You should answer all the questions!';
    }
    echo '<h2>Your perfect Match:</h2>';
    $mismatchUser = getMismatch(getSessionUserid());
    $muser = $mismatchUser->user;
    echo "<a href='profile.php?userid=$muser->_userid'>$muser->_firstname $muser->_lastname</a>
    <br>
    <img src='$muser->_image'>
    <br>
    <span>Born in $muser->_birthdate</span>
    <hr>
    <span>$mismatchUser->mismatches topics \"in\" common</span>
    <ul>
    ";
    for($i=0;$i<sizeof($mismatchUser->topics);$i++) {
        $topic = $mismatchUser->topics[$i][0];
        echo '<li>'.$topic.'</li>';
    }
    echo '</ul>';

    $mismatchByCategories = getMismatchByCategories(getSessionUserid(), $muser->_userid);
    echo '<br>By Categories<br><ul>';
    for($i=0;$i<sizeof($mismatchByCategories);$i++) {
        echo '<li>'.$mismatchByCategories[$i][0].' mismatch - '.$mismatchByCategories[$i][1].'</li>';
    }
    echo '</ul>';
?>