<?php
    require_once('session.php');
?>
    <div class="navmenu">
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
            <?php
                if(isLogged()) {
            ?>
            <li><a href="questionaire.php"><i class="fas fa-question-circle"></i>Questionaire</a></li>
            <?php
                    if(isAdmin()){
                        echo '<li><a href="categories.php"><i class="fas fa-clipboard-list"></i>Categories</a></li>';
                        echo '<li><a href="topics.php"><i class="fas fa-clipboard-check"></i>Topics</a></li>';
                    }
                }
            ?>    
        <div class="loginmenu">
<?php
    if(isLogged()){
?>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        <li><a href="profile.php?userid=<?php echo getSessionUserid(); ?>"><i class="fas fa-user-circle"></i>(<?php echo getSessionUsername(); ?>)</a></li>
<?php
    } else{
?>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
<?php
    }
?>
        </div>
    </div>