<?php
    require_once('connectdb.php');
    require_once('dbvars.php');

    function insertNewResponses($userid){
        $query = 'insert into '.TABLE_RESPONSES.' (topicid,userid) (select id, '.$userid.' from '.
        TABLE_TOPICS.' where id not in (select topicid from '.TABLE_RESPONSES.' where userid = '.$userid.'));';
        $dbc = connectDB();
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }

    function getResponsesWithoutResponse($userid){
        $query = 'select count(1) from '.TABLE_RESPONSES.' where userid = '.$userid.' and ifnull(response,0) = 0;';
        $dbc = connectDB();
        $result = mysqli_query($dbc,$query);
        $count = mysqli_fetch_row($result)[0];
        mysqli_close($dbc);
        return $count;
    }

    function updateResponse($id,$response){
        $query = 'update '.TABLE_RESPONSES.' set response = '.$response.' where id = '.$id.';';
        $dbc = connectDB();
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }

    function getUserResponses($userid){
        $query = 'select '.TABLE_RESPONSES.'.id, category, topic, response 
        from '.TABLE_RESPONSES.' inner join '.TABLE_TOPICS.' on '.TABLE_TOPICS.'.id = topicid 
        inner join '.TABLE_CATEGORIES.' on '.TABLE_CATEGORIES.'.id = categoryid 
        where userid = '.$userid.' order by category, topic asc;';
        $dbc = connectDB();
        $result = mysqli_query($dbc,$query);
        $responses = array();
        while($response = mysqli_fetch_assoc($result)){
            array_push($responses,$response);
        }
        mysqli_close($dbc);
        return $responses;
    }
?>