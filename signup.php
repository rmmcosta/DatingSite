<?php
    $_title = 'Sign Up';
    include_once('header.php');
    include_once('menu.php');
    require_once('commonclasses.php');
    require_once('signupcs.php');

    $_showForm = true;
    $_username = '';
    $_password = '';
    $_retypepassword = '';

    if(isset($_POST['submit'])) {

        $_username = $_POST['username'];
        $_password = $_POST['password'];
        $_retypepassword = $_POST['retypepassword'];

        $_isInputValid = isValidNewRegister($_username, $_password, $_retypepassword);

        if($_isInputValid->_result){
            $_showForm = false;
        } else {
            echo $_isInputValid->_errorMessage;
        }
    }
    if($_showForm)
    {
?>

        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <fieldset class="fieldsetRegister">
                <legend>Registration Info</legend>
                <label for="username">Username</label> 
                <input type="text" name="username" value='<?php echo $_username;?>'>
                <label for="password">Password</label>
                <input type="password" name="password" value='<?php echo $_password;?>'>
                <label for="retypepassword">Retype Password</label>
                <input type="password" name="retypepassword" value='<?php echo $_retypepassword;?>'>
                <input type="submit" name="submit" value="Register">
            </fieldset>
        </form>

<?php
    } else {
        header('Location: login.php');        
    }
?>

<?php
    include_once('footer.php');
?>