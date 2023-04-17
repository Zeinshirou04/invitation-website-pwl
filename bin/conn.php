<?php
    // Database initialization
    $host = 'localhost';
    $username = 'zen';
    $pass = '';
    $db_main = 'web-lanjut-prototype';
    $db_user_tables = 'web-lanjut-prototype-user';

    // Connection Variables
    $conn = mysqli_connect($host, $username, $pass, $db_main);
    $conn_tables = mysqli_connect($host, $username, $pass, $db_user_tables);
    
    if(!$conn) echo "error : " . mysqli_connect_error();