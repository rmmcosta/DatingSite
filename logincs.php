<?php
    require_once('commonclasses.php');
    require_once('connectdb.php');
    require_once('dbvars.php');

    function isValidLogin($username, $password){
        $isValid = new Validation();
        $isValid->_result = false;

        if(empty($username)) {
            $isValid->_errorMessage = 'Please input the username!';
            return $isValid; 
        }

        if(empty($password)) {
            $isValid->_errorMessage = 'Please input the password!';
            return $isValid; 
        }

        $_dbc = connectDB();

        $_query = "Select id, isadmin from ".TABLE_USERS." where username='$username' and password=sha('$password');";

        $_data = mysqli_query($_dbc,$_query);
        $_numRows = mysqli_num_rows($_data);
        $_validUserPwd = ($_numRows==1);

        if(!$_validUserPwd) {
            $isValid->_errorMessage = 'Invalid Username or Password!';
            return $isValid;
        }

        $isValid->_result = true;

        //put in session
        $row=mysqli_fetch_array($_data,MYSQLI_ASSOC);
        setUserSession($username,$row['id'],$row['isadmin']);
        setUserCookies($username,$row['id'],$row['isadmin']);
        return $isValid;

    }
?>