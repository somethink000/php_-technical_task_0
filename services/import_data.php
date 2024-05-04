<?php
    
    require('services/connect.php');
    

    function importPosts($data, $conn)
    {
      foreach ($data as $i)
      {
        $sql = "INSERT INTO Posts (title, body, userId)
        VALUES ('".$i->title."', '".$i->body."', '".$i->userId."')";
        
        if ($conn->query($sql) === TRUE) 
        {
            echo "New post row created ...".PHP_EOL;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

      }
    }


    function importComments($data, $conn)
    {
      foreach ($data as $i)
      {
        $sql = "INSERT INTO Comments (name, email, body, postId)
        VALUES ('".$i->name."', '".$i->email."', '".$i->body."', '".$i->postId."')";


        //DRY Alarm DRY Alarm
        if ($conn->query($sql) === TRUE) 
        {
            echo "New comment row created ...".PHP_EOL;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }

      

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