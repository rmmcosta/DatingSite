<?php
    include('header.php');
    include('menu.php');

    if(!isLogged()){
        header('Location:index.php');
    }

    require_once('categoriescs.php');
    
    $categoryid = (isset($_GET['id']) ? $_GET['id'] : null);
    $category = getCategory($categoryid);
    if(isset($_POST['submit'])){
        createOrUpdateCategory($_POST['id'],$_POST['category']);
        header('Location:categories.php');
    }
?>

    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <input type="hidden" name="id" id="id" value="<?php echo $categoryid; ?>">
        <label for="category">Category</label>
        <input type="text" name="category" id="category" value="<?php echo $category; ?>">
        <hr>
        <input type="submit" name="submit" id="submit" value="Save">
    </form>