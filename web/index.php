
<!DOCTYPE html>


<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>
        <link rel="stylesheet" href="/style/style.css">
    </head>
   
    

    <body>
        
    <?php

  
            $con = mysqli_connect("db","example","secret2","stage") or die('Failed to connect to the database, died with error:');

            $sql = "SELECT id, title, body FROM MyGuests";
            $result = mysqli_query($con, $sql);//$conn->query($sql);


            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["body"]. "<br>";
            }
            } else {
            echo "0 results";
            }

        ?>

    </body> 

</html>




<!--
$conn = new mysqli("database", "root", ".sweetpwd.", "my_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row['name']."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
 -->
