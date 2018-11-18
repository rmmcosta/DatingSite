<?php
    require_once('connectdb.php');
    require_once('dbvars.php');

    class User{
        public $_userid;
        public $_username;
        public $_firstname;
        public $_lastname;
        public $_image;
        public $_birthdate;
    }

    function getUser($userid){
        $_dbc = mysqli_connect(DB_LOCATION,DB_USER,DB_PWD,DB_NAME);
        $_query = "Select ".TABLE_USERSINFO.".firstname, ".TABLE_USERSINFO."
        .lastname, ".TABLE_USERSINFO.".birthdate, ".TABLE_USERSIMAGE.
        "image from ".TABLE_USERSINFO." left join ".TABLE_USERSIMAGE."
         on ".TABLE_USERSIMAGE.".datinguserid = ".TABLE_USERSINFO.".datinguserid
         where ".TABLE_USERSINFO.".datinguserid = $userid
        ;";
        $_data = mysqli_query($_dbc,$_query);
        $_row = mysqli_fetch_row($_data);
        mysqli_close($_dbc);
        $_user = new User();
        if(isset($_row)){
          $_user->_firstname = ($_row[0]===null?'unknown':$_row[0]);
          $_user->_lastname = ($_row[1]===null?'unknown':$_row[1]);
          $_user->_image = ($_row[2]===null?'images/unknownuser.png':'images/'.$_row[2]);
          $_user->_birthdate = ($_row[3]===null?'unknown':$_row[3]);
        }
        return $_user;
    }

    function getUsers(){
        $_dbc = mysqli_connect(DB_LOCATION,DB_USER,DB_PWD,DB_NAME);
        $_query = "Select ".TABLE_USERS.".id,"
        .TABLE_USERS.".username, ".TABLE_USERSIMAGE.
        ".image from ".TABLE_USERS." left join ".TABLE_USERSIMAGE."
         on ".TABLE_USERSIMAGE.".datinguserid = ".TABLE_USERS.".id".
         (isset($_SESSION['userid']) ? " where ".TABLE_USERS.".id<>".$_SESSION['userid'].";":";");
        
        $_users=array();

        if ($result = mysqli_query($_dbc, $_query)) {

             /* fetch associative array */
             $i=0;
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new User();
                $user->_userid = $row['id'];
                $user->_username = $row['username'];
                $user->_image = (isset($row['image'])?'images/'.$row['image']:'images/unknownuser.png');
                $_users[$i] = $user;
                $i++;
            }

            /* free result set */
            mysqli_free_result($result);
        }

        /* close connection */
        mysqli_close($_dbc);
        return $_users;
    }
?>