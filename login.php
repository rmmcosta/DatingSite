<?php
    $_title = 'Login';
    include_once('header.php');
    include_once('menu.php');
    require_once('commonclasses.php');
    require_once('logincs.php');

    $_username = '';
    $_password = '';
    $_showForm = true;

    if(isset($_POST['submit'])){
        $_username = $_POST['username'];
        $_password = $_POST['password'];
        $isValid = isValidLogin($_username, $_password);

        if($isValid->_result){
            $_showForm = false;
        } else{
            echo $isValid->_errorMessage;
        }
    }

    if($_showForm){
?>
    <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
        <label for='username'>Username</label>
        <input type='text' name='username' value='<?php echo $_username; ?>'>
        <label for='password'>Password</label>
        <input type='password' name='password' value='<?php echo $_password; ?>'>
        <input type='submit' name='submit' value='Submit'>
    </form>
<?php
    } else{
        header('Location: index.php');
    }
    include_once('footer.php');
?>