<?php

function Createdb(){
    $servername = "db";
    $username = "user";
    $password = "test";
    $dbname = "bookstore";
    $port = 3306;

    // Create connection
    $con = mysqli_connect($servername, $username, $password, '', $port);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // Create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname, $port);

        $sql = "
            CREATE TABLE IF NOT EXISTS books(
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                book_name VARCHAR(25) NOT NULL,
                book_publisher VARCHAR(20),
                book_price FLOAT
            );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        } else {
            echo "Cannot Create table...!";
        }
    } else {
        echo "Error while creating database ". mysqli_error($con);
    }
}

// Create the database and table if they don't exist
$database = Createdb();

// Check if the connection is established
if ($database) {
    echo "Database and Table created successfully";
} else {
    echo "Database creation failed";
}
?>
