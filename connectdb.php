<?php
    define('DB_LOCATION','localhost');
    define('DB_USER','root');
    define('DB_PWD','');
    define('DB_NAME','datingsite');

    function connectDB(){
        $dbc = mysqli_connect(DB_LOCATION,DB_USER,DB_PWD,DB_NAME)
        or die('Unable to connect to the '.DB_NAME.' database!');

        return $dbc;
    }
?>