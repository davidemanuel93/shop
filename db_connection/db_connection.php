<?php

function connect_db($dbServer = "localhost", $dbUsername = "root",
                    $dbPassword = "",
                    $dbName = "shop") {

    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
    if (!$conn) {
        throw new Exception(mysqli_error($conn));
    }
    
    if(!mysqli_set_charset($conn, 'utf8')){
        throw new Exception('Cannot set coding UTF-8 characters.');
    }
    
    return $conn;
}

?>