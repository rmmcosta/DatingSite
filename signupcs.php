<?php
    require_once('commonclasses.php');
    require_once('connectdb.php');
    require_once('dbvars.php');

    function isValidNewRegister($username, $pwd, $retypepwd){
        $isValid = new Validation();
        $isValid->_result = false;
        if(empty($username) || empty($pwd) || empty($retypepwd)){
            $isValid->_errorMessage='All fields are mandatory!'.'<br>';
            return $isValid;
        }

        if($pwd != $retypepwd){
            $isValid->_errorMessage='Passwords don\'t match!'.'<br>';
            return $isValid;
        }

        
        $_dbc = connectDB();

        $_query = "insert into ".TABLE_USERS." (username, password) 
        values ('$username', sha('$pwd'));";

        $_result = mysqli_query($_dbc,$_query) 
                or die('Unable to Register User!');

        mysqli_close($_dbc);

        $isValid->_result = true;
        return $isValid;
    }
?>