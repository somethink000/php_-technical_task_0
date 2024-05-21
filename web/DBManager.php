<?php


function fetch($value = '')
{
    

    $result = array();

    $pdo = new PDO('mysql:host=db;dbname=stage', "example", "secret2");


    if ( strlen($value) > 2) {
        
        $commentsResult = $pdo->query("SELECT * FROM Comments WHERE name LIKE '%" . $value . "%'");
        
    
        $commentsResultArray = array();
        
        foreach ($commentsResult as $comment){
            $commentsResultArray[] = $comment;
        }
         
            

        $postsIds = array_unique(array_map(fn($comment) => $comment['postId'], $commentsResultArray));

        $postsIdsSQL = implode(',', $postsIds);

        $postsResult = $pdo->query("SELECT * FROM Posts WHERE id IN ($postsIdsSQL)");

        foreach ($postsResult as $post) {
            $result[$post['id']] = $post;
        }

        foreach ($commentsResultArray as $comment) {

            $result[$comment['postId']]['comment'] = $comment['name'];

        }

    } else {

        $result = $pdo->query("SELECT * FROM Posts");
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


    $pdo = null;
    $dbh = null;

}   
if (isset($_GET['search'])) {

    fetch(htmlspecialchars($_GET['search']));
}
