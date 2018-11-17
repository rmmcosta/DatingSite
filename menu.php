<?php
    require_once('session.php');
?>
    <ul>
<?php
    if(isLogged()){
?>
        <li><a href="#">(<?php echo getSessionUsername();?>)</a></li>
        <li><a href="logout.php">Logout</a></li>
<?php
    } else{
?>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
<?php
    }
?>
    <ul>