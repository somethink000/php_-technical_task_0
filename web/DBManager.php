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
  $sql = "SELECT * FROM Posts WHERE title LIKE '%".$value."%'";
  $result = mysqli_query($connection, $sql);

  if($result) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Name</th>";
    echo "</tr>";
    while ($row = mysqlI_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['title']."</td>";
      echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Error :".$sql."<br>".mysqli_error($connection);
    }

    conectionEnd($connection);
  }
if (isset($_GET['search'])) {
  fetch($_GET['search']);
  }
?>