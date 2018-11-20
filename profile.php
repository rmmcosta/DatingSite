<?php
    $_title = 'Profile';
    require_once('commonvars.php');
    include_once('header.php');
    include_once('menu.php');
    require_once('userscs.php');
    require_once('imagescs.php');
    

    if(!isset($_SESSION['userid'])){
        header('Location:index.php');
    }
    $getuserid = $_GET['userid'];

    $userobj = getUser($getuserid);

    if(isset($_POST['submit'])){
        $userobj->_userid = $getuserid;
        $userobj->_firstname = $_POST['firstname'];        
        $userobj->_lastname = $_POST['lastname'];
        $userobj->_birthdate = $_POST['birthdate'];
        $image = $_FILES['picture'];
        $userobj->_image = IMAGESFOLDER.$image['name'];
        //move the image form temp folder and grab the name
        if(validateImage($image)){
            saveImage($image);
            createOrUpdateUser($userobj);
            header('Location:index.php');
        } else{
            echo 'The image is not valid!<br>';
        }
    }
?>

    <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']?>">
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
        <input type="file" name="picture" id="picture">
        <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>