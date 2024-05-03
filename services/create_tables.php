
<?php

require('web/connect.php');


   // echo( $conn );
    $conn = new mysqli('127.0.0.1', 'example', 'secret2', 'stage');

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // //MyGuests
    // $sql = "CREATE TABLE Posts (
    //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     title TEXT NOT NULL,
    //     body TEXT NOT NULL,
    //     userId INT NOT NULL
    // )";

    // if ($conn->query($sql) === TRUE) {
    // echo "Table Posts created successfully";
    // } else {
    // echo "Error creating table: " . $conn->error;
    // }

    $conn->close();


?>