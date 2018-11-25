<?php
     $_title = 'Categories';
     require_once('commonvars.php');
     include_once('header.php');
     include_once('menu.php');
     require_once('categoriescs.php');     
 
     if(!isLogged()){
         header('Location:index.php');
     }
     echo '<a href="category.php">New Category</a><hr>';
     $categories = getCategories();
     if(sizeof($categories)==0) {
         echo 'No Categories to show...';
     } else {
        echo '<table><tr><th></th><th>Category</th><th>Delete</th></tr>';
        foreach($categories as $category){
            echo '<tr>
                    <td></td>
                   <td><a href="category.php?id='.$category['id'].'">'.$category['category'].'<a></td>
                   <td><a href="deleteCategory.php?id='.$category['id'].'">Delete</a></td>
                   </tr>';
        }
        echo '</table>';
     }
?>