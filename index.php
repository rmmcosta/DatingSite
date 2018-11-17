<?php
    $_title = 'Find your Dream Date';
    require_once('session.php');
    include_once('header.php');
    include_once('menu.php');
    require_once('userscs.php');
    $allusers = getUsers();
    echo '<ul>';
    foreach($allusers as $anuser) {
        echo "<li>$anuser->_username <img src='$anuser->_image'></li>";
    }
?>

<?php
    include_once('footer.php');
?>