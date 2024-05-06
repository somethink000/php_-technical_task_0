<?php
    
    require('services/connect.php');
    

    function importPosts($data, $conn)
    {
      $count = 0;

      foreach ($data as $i)
      {
        $sql = "INSERT INTO Posts (title, body, userId)
        VALUES ('".$i->title."', '".$i->body."', '".$i->userId."')";
        
        if ($conn->query($sql) != TRUE) echo "Error: " . $sql . "<br>" . $conn->error;
        
        $count++;
      }
      echo "Загружено постов: ".$count.PHP_EOL;
    }


    function importComments($data, $conn)
    {

      $count = 0;

      foreach ($data as $i)
      {
        $sql = "INSERT INTO Comments (name, email, body, postId)
        VALUES ('".$i->name."', '".$i->email."', '".$i->body."', '".$i->postId."')";


        if ($conn->query($sql) != TRUE) echo "Error: " . $sql . "<br>" . $conn->error;
        
        $count++;
      }

      echo "Загружено коментариев: ".$count.PHP_EOL;

    }

   

    $urls = array(
      'https://jsonplaceholder.typicode.com/posts',
      'https://jsonplaceholder.typicode.com/comments',
    );

    
    $curlSession = curl_init();

      foreach($urls as $item)
      {
        
        curl_setopt($curlSession, CURLOPT_URL, $item);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        

        if ($item == 'https://jsonplaceholder.typicode.com/posts')
        {
          importPosts($jsonData, $conn);
        }
        elseif($item == 'https://jsonplaceholder.typicode.com/comments')
        {
          importComments($jsonData, $conn);
        }

      }

    curl_close($curlSession); 

    

?>