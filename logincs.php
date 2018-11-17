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

        $_dbc = mysqli_connect(DB_LOCATION,DB_USER,DB_PWD,DB_NAME)
            or die("Unable to connect ot the $_dbname database!");

        $_query = "Select 1 from ".TABLE_USERS." where username='$username' and password=sha('$password');";

        $_data = mysqli_query($_dbc,$_query);
        $_numRows = mysqli_num_rows($_data);
        $_validUserPwd = ($_numRows==1);

        if(!$_validUserPwd) {
            $isValid->_errorMessage = 'Invalid Username or Password!';
            return $isValid;
        }

        $isValid->_result = true;
        return $isValid;

    }
?>