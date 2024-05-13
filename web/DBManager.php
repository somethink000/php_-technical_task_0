<?php

function conectionStart()
{
    $servername = "db";
    $username = "example";
    $password = "secret2";
    $dbname = "stage";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    return $connection;
}
function conectionEnd($value)
{
    mysqli_close($value);
}
function fetch($value = '')
{
    $connection = conectionStart();

    $result = array();
   
    if ( strlen($value) > 2) {

        // $commentsSql = mysqli_query($connection, "SELECT * FROM Comments WHERE name LIKE '%" . $value . "%'");
        
     
        // if ($connection->query($commentsSql) != TRUE) 
        // {
        //     echo "<h1>По запросу ничего не найдено</h1>";
        //     return;
        // }
            
        // $commentsResult = $connection->query($commentsSql);


        $commentsResult = mysqli_query($connection, "SELECT * FROM Comments WHERE name LIKE '%" . $value . "%'") or die(); echo("<h1>Ничего не найдено</h1>"); return; 

        $commentsResultArray = array();
        while($row = mysqli_fetch_assoc($commentsResult)) {
            $commentsResultArray[] = $row;
        }

        $postsIds = array_unique(array_map(fn($comment) => $comment['postId'], $commentsResultArray));

        $postsIdsSQL = implode(',', $postsIds);

        $postsResult = mysqli_query($connection, "SELECT * FROM Posts WHERE id IN ($postsIdsSQL)");

        foreach ($postsResult as $post) {
            $result[$post['id']] = $post;
        }

        foreach ($commentsResult as $comment) {

            $result[$comment['postId']]['comment'] = $comment['name'];

        }
    } else {
        $result = mysqli_query($connection, "SELECT * FROM Posts");
    }


    if ($result) {


        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Id</th>";
        echo "<th scope='col'>Title</th>";
        echo "<th scope='col'>Body</th>";
        echo "<th scope='col'>Comment</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($result as $row) {

            echo "<tr>";
            echo "<th scope='row'>" . $row['id'] . "</th>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['body'] . "</td>";

            if (isset($row['comment'])) {
                echo "<td>" . $row['comment'] . "</td>";
            }

            echo "</tr>";
        }

        echo "</tbody>";
    } else {
        return;
    }

    conectionEnd($connection);
}
if (isset($_GET['search'])) {

    fetch(htmlspecialchars($_GET['search']));
}
