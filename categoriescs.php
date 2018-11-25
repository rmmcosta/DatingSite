<?php
    require_once('connectdb.php');
    require_once('dbvars.php');

    function getCategories(){
        $categories = array();
        $query = 'Select id, category from '.TABLE_CATEGORIES.';';
        $dbc = connectDB();
        $data = mysqli_query($dbc,$query);
        while($row = mysqli_fetch_assoc($data)){
            array_push($categories,$row);
        }
        mysqli_close($dbc);
        return $categories;
    }

    function getCategory($id){
        if($id == null){
            return null;
        }
        $query = 'Select category from '.TABLE_CATEGORIES.' where id = '.$id.';';
        $dbc = connectDB();
        $data = mysqli_query($dbc,$query);
        $category = mysqli_fetch_row($data)[0];
        mysqli_close($dbc);
        return $category;
    }

    function createOrUpdateCategory($id,$category){
        if($id == null){
            createCategory($category);
        } else {
            updateCategory($id,$category);
        }
    }

    function createCategory($category){
        $query = 'insert into '.TABLE_CATEGORIES.' (category) values(\''.$category.'\');';
        $dbc = connectDB();
        echo $query;
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }

    function updateCategory($id, $category){
        $query = 'update '.TABLE_CATEGORIES.' set category = \''.$category.'\' where id = '.$id.';';
        $dbc = connectDB();
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }

    function deleteCategory($id){
        $query = 'delete from '.TABLE_CATEGORIES.' where id = '.$id.';';
        $dbc = connectDB();
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }
?>