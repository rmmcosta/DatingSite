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
        ".image from ".TABLE_USERSINFO." left join ".TABLE_USERSIMAGE."
         on ".TABLE_USERSIMAGE.".datinguserid = ".TABLE_USERSINFO.".datinguserid
         where ".TABLE_USERSINFO.".datinguserid = $userid
        ;";

        $_data = mysqli_query($_dbc,$_query);
        $_row = mysqli_fetch_array($_data);
        $_user = new User();
        $_user->_userid = $userid;
        $_user->_firstname = ($_row['firstname']===null?'unknown':$_row['firstname']);
        $_user->_lastname = ($_row['lastname']===null?'unknown':$_row['lastname']);
        $_user->_image = ($_row['image']===null?'images/unknownuser.png':$_row['image']);
        $_user->_birthdate = ($_row['birthdate']===null?'unknown':$_row['birthdate']);
        mysqli_close($_dbc);
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
                $user->_image = (isset($row['image'])?$row['image']:'images/unknownuser.png');
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

    function createOrUpdateUser($user){
        $_dbc = mysqli_connect(DB_LOCATION,DB_USER,DB_PWD,DB_NAME);
        $_existsInfoQuery = "Select 1 from ".TABLE_USERSINFO." where datinguserid = $user->_userid;";
        $_existsInfo = mysqli_query($_dbc,$_existsInfoQuery);
        $_updateInfo = ( mysqli_num_rows($_existsInfo)==1 ? 1 : 0 );
        $_existsImageQuery = "Select 1 from ".TABLE_USERSIMAGE." where datinguserid = $user->_userid;";
        $_existsImage = mysqli_query($_dbc,$_existsImageQuery);
        $_updateImage = ( mysqli_num_rows($_existsImage)==1 ? 1 : 0 );
        
        $_createOrUpdateInfo='';
        if($_updateInfo){
            $_createOrUpdateInfo = "update ".TABLE_USERSINFO." 
            set firstname = '$user->_firstname',
            lastname = '$user->_lastname', 
            birthdate = '$user->_birthdate' 
            where datinguserid = $user->_userid;";
        } else{
            $_createOrUpdateInfo = "insert into ".TABLE_USERSINFO."
            values (
            $user->_userid,
            '$user->_firstname',
            '$user->_lastname', 
            '$user->_birthdate'
            );";
        }
        echo $_createOrUpdateInfo;
        mysqli_query($_dbc,$_createOrUpdateInfo);

        $_createOrUpdateImage='';
        if($_updateImage){
            $_createOrUpdateImage = "update ".TABLE_USERSIMAGE." 
            set image = '$user->_image'
            where datinguserid = $user->_userid;";
        } else{
            $_createOrUpdateImage = "insert into ".TABLE_USERSIMAGE."
            values (
            $user->_userid,
            '$user->_image'
            );";
        }
        echo $_createOrUpdateImage;
        mysqli_query($_dbc,$_createOrUpdateImage);

        mysqli_close($_dbc);
    }
?>