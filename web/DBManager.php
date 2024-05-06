<?php

function conectionStart(){
  $servername = "db";
  $username = "example";
  $password = "secret2";
  $dbname = "stage";
  $connection = mysqli_connect($servername, $username, $password, $dbname);
  return $connection;
 }
function conectionEnd($value){
  mysqli_close($value);
 }
function fetch($value=''){
    $connection = conectionStart();
    
    $result = array();

    if (strlen($value) > 2)
    {

        $commentsResult = mysqli_query($connection, "SELECT * FROM Comments WHERE name LIKE '%".$value."%'");

        
        foreach ($commentsResult as $item)
        {   
            
            $postsResult = mysqli_query($connection, "SELECT * FROM Posts WHERE id = '".$item['postId']."'"); 
            
            foreach($postsResult as $i)
            {
                
                if(!isset($result[$i['id']]))
                {
                    $result[$i['id']] = $i;
                    $result[$i['id']]['comment'] = $item['name'];
                }
            }
            
        }
    }else
    {
        $result = mysqli_query($connection, "SELECT * FROM Posts"); 
    }


    if($result) {
        

        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'>Id</th>";
                echo "<th scope='col'>Title</th>";
                echo "<th scope='col'>Body</th>";
                echo "<th scope='col'>Comment</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        foreach($result as $row){
            
            echo "<tr>";
            echo "<th scope='row'>".$row['id']."</th>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['body']."</td>";

            if (isset($row['comment'])){
                echo "<td>".$row['comment']."</td>";
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
        fetch($_GET['search']);
    }
?>