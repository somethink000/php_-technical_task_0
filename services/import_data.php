<?php
    
    // $curlSession = curl_init();
            // curl_setopt($curlSession, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/posts');
            // curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
            // curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

            // $jsonData = json_decode(curl_exec($curlSession));
            
            // var_dump($jsonData[1]->title);

            // curl_close($curlSession);



    $conn = new mysqli('127.0.0.1', 'example', 'secret2', 'stage');

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO MyGuests (title, body, userId)
    VALUES ('John', 'Doe', 1)";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

?>