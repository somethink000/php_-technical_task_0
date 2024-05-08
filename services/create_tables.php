
<?php

    require('services/connect.php');


        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


        $commentsResult = mysqli_query($conn, "SELECT * FROM Comments");
        $commentsResultArray = array();
        while($row = mysqli_fetch_assoc($commentsResult)) {
            $commentsResultArray[] = $row;
        }

        //$postsIds = array_unique(array_map(fn($comment) => $comment['postId'], $commentsResultArray));
        foreach($commentsResultArray as $i)
        {
            var_dump($i['postId']);
        }


        // $sql = [];

        // $sql[] = "CREATE TABLE Posts (
        //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     title TEXT NOT NULL,
        //     body TEXT NOT NULL,
        //     userId INT NOT NULL
        // )";

        
        // $sql[] = "CREATE TABLE Comments (
        //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     name VARCHAR(255) NOT NULL,
        //     email VARCHAR(255) NOT NULL,
        //     body TEXT NOT NULL,
        //     postId INT NOT NULL
        // )";

        // foreach($sql as $item)
        // {
        //     if ($conn->query($item) === TRUE) 
        //     {
        //         echo "New table created ...".PHP_EOL;
        //     } else {
        //         echo "Error: " . $sql . "<br>" . $conn->error;
        //     }
        // }
        
?>