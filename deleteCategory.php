<?php
    require_once('categoriescs.php');
    if(isset($_GET['id'])){
        deleteCategory($_GET['id']);
    }
    header('Location:categories.php');
?>