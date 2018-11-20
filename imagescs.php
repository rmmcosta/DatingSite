<?php
    require_once('commonvars.php');
    function saveImage($imageFile){
        $target = IMAGESFOLDER.$imageFile['name'];
        move_uploaded_file($imageFile['tmp_name'],$target);
        @unlink($imageFile['name']);
    }

    function validateImage($imageFile){
        return $imageFile['error'] == 0;
    }
?>