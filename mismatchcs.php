<?php
    require_once('dbvars.php');
    require_once('connectdb.php');
    require_once('userscs.php');

    class MismatchUser {
        public  $user;
        public  $topics;
        public  $mismatches;
    }

    function getMismatch($userid){
        $mismatchUser = new MismatchUser();
        $mismatchUser->user = new User();
        
        $query = 'select max(countmismatches), userid from (
            select count(1) countmismatches, b.userid 
            from datingresponses a 
            inner join datingresponses b 
            where a.topicid = b.topicid
            and a.userid <> b.userid and a.response <> b.response and a.userid ='.$userid.' group by b.userid
        ) innerquery;';
        $dbc = connectDB();
        //result object
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_row($result);
        $mismatchUser->user = getUser($row[1]);
        $mismatchUser->mismatches = $row[0];

        $queryTopics = 'select topic 
        from datingresponses a 
        inner join datingresponses b 
        on a.topicid = b.topicid 
        and a.userid <> b.userid 
        and a.response <> b.response 
        and a.userid = '.$userid.' and b.userid = '.$row[1].' 
        inner join datingtopics 
        on datingtopics.id = a.topicid;';

        $resultTopics = mysqli_query($dbc,$queryTopics);
        $topicArray = mysqli_fetch_all($resultTopics, MYSQLI_NUM);
        $mismatchUser->topics = $topicArray;

        mysqli_close($dbc);
        return $mismatchUser;
    }
?>