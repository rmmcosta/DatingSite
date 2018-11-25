<?php
    require_once('topicscs.php');
    if(isset($_GET['id'])){
        deleteTopic($_GET['id']);
    }
    header('Location:topics.php');
?>