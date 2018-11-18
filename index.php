<?php
    $_title = 'Find your Dream Date';
    require_once('session.php');
    include_once('header.php');
    include_once('menu.php');
    require_once('userscs.php');
    $allusers = getUsers();
    echo '<div class="content">';
    echo '<heading1>Registered Members</heading1>';
    echo '<ul>';
    foreach($allusers as $anuser) {
        echo "<li><a href='profile.php?userid=$anuser->_userid'>$anuser->_username</a><br><img src='$anuser->_image'></li>";
    }
    echo '</ul>';
?>
    </div>
<?php
    include_once('footer.php');
?>