<?php
    define('HOST', 'localhost');
    define('DATABASE', 'foodshop');
    define('USERNAME', 'root');
    define('PASSWORD', 'root');

    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed Show Error : " . $conn->connect_error);
    }
