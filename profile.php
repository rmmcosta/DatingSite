<?php
    include_once('header.php');
    include_once('menu.php');
    require_once('userscs.php');

    if(!isset($_SESSION['userid'])){
        header('Location:index.php');
    }
    $getuserid = $_GET['userid'];
    
    $userobj = getUser($getuserid);
?>

    <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
        <fieldset class="fieldsetProfile">
            <legend>Profile</legend>
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" value="<?php echo $userobj->_firstname; ?>">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" value="<?php echo $userobj->_lastname; ?>">
        <label for="birthdate">Birthdate</label>
        <input type="date" name="birthdate" value="<?php echo $userobj->_birthdate; ?>">
        <label for="picture">Picture</label>
        <img src="<?php echo $userobj->_image; ?>">
        <input type="file" name="picture">
        <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>