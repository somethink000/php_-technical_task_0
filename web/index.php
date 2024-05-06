
<html lang="en" dir="ltr">
  <head>
    <title>MIM</title>
    <script>
      function usersearchTxt(str) {
        if (str.length == 0) {
          document.getElementById("searchTable").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200){
              document.getElementById('searchTable').innerHTML = this.responseText;
              //document.getElementById("searchTable").style.border="1px solid #A5ACB2";
              }
            }
          xmlhttp.open("GET","DBManager.php?search="+str,true);
          xmlhttp.send();

        }
      }
    </script>
  </head>
  <body>
    <input id="searchBox" type="text" name="" onkeyup="usersearchTxt(this.value)">
    <button type="button" name="button" onclick="usersearchTxt(document.getElementById('searchBox').value);">search</button>

    <div id="searchTable">
      <table>
        <tr>
          <th>Id</th>
          <th>Name</th>
        </tr>
        <?php
          include 'DBManager.php';
          echo fetch('');
        ?>
      </table>
    </div>
  </body>
</html>






<!-- 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <title></title>
        
       
    </head>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/">Import in mysql example</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        
                </ul>

            </div>
        </div>
    </nav>
    

    <body class="container">

        <?php

    
            $con = mysqli_connect("db","example","secret2","stage") or die('Failed to connect to the database, died with error:');
            $sql = "SELECT * FROM Posts";
            $result = mysqli_query($con, $sql);


            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["body"]. "<br>";
                }
            } else {
                echo "0 results";
            }

        ?>


            <br/>
            <div class="row">
                <div class="col-sm-8">
                        <form  onsubmit="submit_data(null);return false;" method="post">
                        <input type="text" autocomplete="off" class="form-control" id="pharse" placeholder="enter your search phrase here..."/>
                </div>
                <div class="col-sm-2">
                        <input type="submit" name="submit" class="btn btn-primary"/>
                        </form>
                </div>
                <div class="col-sm-2">
                    <img id="loadingDiv" src="public/img/ajax-loader.gif" />
                </div>
            </div>
            </div>
            <div>
                <ul class="list-group floatinglist" id="searchKeyLists">
                </ul>

            
    </body>


    <footer class="py-2 bg-dark"> </footer>

</html>  
   
 -->
