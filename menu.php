<?php
    require_once('session.php');
?>
    <div class="loginmenu">
    <ul>
<?php
    if(isLogged()){
?>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="profile.php?userid=<?php echo getSessionUserid(); ?>">(<?php echo getSessionUsername(); ?>)</a></li>
<?php
    } else{
?>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
<?php
    }
?>
    <ul>
    </div>