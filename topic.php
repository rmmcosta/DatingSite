<?php
    $_title = 'Topics';
    include('header.php');
    include('menu.php');
    
    if(!isLogged()){
        header('Location:index.php');
    }

    require_once('topicscs.php');
    require_once('categoriescs.php');

    if(isset($_POST['submit'])){
        createOrUpdateTopic($_POST['id'],$_POST['topic'],$_POST['category']);
        header('Location:topics.php');
    }
    
    $topicid = (isset($_GET['id']) ? $_GET['id'] : null);
    $topic = getTopic($topicid);
    $categories = getCategories();
?>

    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <input type="hidden" name="id" id="id" value="<?php echo $topicid; ?>">
        <label for="topic">Topic</label>
        <input type="text" name="topic" id="topic" value="<?php echo $topic; ?>">
        <br>
        <label for="category">Category</label>
        <select name="category" id="category">
            <?php
                foreach($categories as $category){
                    echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
                }
            ?>
        </select>
        <hr>
        <input type="submit" name="submit" id="submit" value="Save">
    </form>