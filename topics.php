<?php
     $_title = 'Topics';
     require_once('commonvars.php');
     include_once('header.php');
     include_once('menu.php');
     require_once('topicscs.php');     
 
     if(!isLogged()){
         header('Location:index.php');
     }
     echo '<a href="topic.php">New Topic</a><hr>';
     $topics = getTopics();
     if(sizeof($topics)==0) {
         echo 'No Topics to show...';
     } else {
        echo '<table><tr><th></th><th>Topic</th><th>Category</th><th>Delete</th></tr>';
        foreach($topics as $topic){
            echo '<tr>
                    <td></td>
                   <td><a href="topic.php?id='.$topic['id'].'">'.$topic['topic'].'<a></td>
                   <td><a href="category.php?id='.$topic['categoryid'].'">'.$topic['category'].'<a></td>
                   <td><a href="deleteTopic.php?id='.$topic['id'].'">Delete</a></td>
                   </tr>';
        }
        echo '</table>';
     }
?>