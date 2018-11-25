<?php
    require_once('connectdb.php');
    require_once('dbvars.php');

    function getTopics(){
        $topics = array();
        $query = 'Select '.TABLE_TOPICS.'.id, topic, categoryid, '.TABLE_CATEGORIES.'.category from '.TABLE_TOPICS.'
         inner join '.TABLE_CATEGORIES.' on '.TABLE_CATEGORIES.'.id = categoryid;';
        $dbc = connectDB();
        $data = mysqli_query($dbc,$query);
        while($row = mysqli_fetch_assoc($data)){
            array_push($topics,$row);
        }
        mysqli_close($dbc);
        return $topics;
    }

    function getTopic($id){
        if($id == null){
            return null;
        }
        $query = 'Select topic, categoryid from '.TABLE_TOPICS.' where id = '.$id.';';
        $dbc = connectDB();
        $data = mysqli_query($dbc,$query);
        $topic = mysqli_fetch_row($data)[0];
        mysqli_close($dbc);
        return $topic;
    }

    function createOrUpdateTopic($id,$topic,$categoryId){
        if($id == null){
            createTopic($topic,$categoryId);
        } else {
            updateTopic($id,$topic,$categoryId);
        }
    }

    function createTopic($topic,$categoryId){
        $query = 'insert into '.TABLE_TOPICS.' (topic, categoryid) values(\''.$topic.'\','.$categoryId.');';
        $dbc = connectDB();
        echo $query;
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }

    function updateTopic($id, $topic,$categoryId){
        $query = 'update '.TABLE_TOPICS.' set topic = \''.$topic.'\',
        categoryid = \''.$categoryId.'\' where id = '.$id.';';
        $dbc = connectDB();
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }

    function deleteTopic($id){
        $query = 'delete from '.TABLE_TOPICS.' where id = '.$id.';';
        $dbc = connectDB();
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }
?>