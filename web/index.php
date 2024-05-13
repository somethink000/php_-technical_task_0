<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <title></title>
        
        <script>
            function usersearchTxt(str) {
                
                if (str.length == 0) {
                    document.getElementById("searchTable").innerHTML = "";
                    str = "";
                }

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () 
                {
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById('searchTable').innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET","DBManager.php?search="+str,true);
                xmlhttp.send();
            }
        </script>
       
    </head>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/">Example</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                   
                   
                </ul>

            </div>
        </div>
    </nav>
    

    <body>
        <div class="container">
            

            <div class="form-outline mb-4 py-5" data-mdb-input-init>
                <input placeholder="Search" type="search" class="form-control" id="searchBox" onkeyup="usersearchTxt(this.value)">
            </div>

            

            <table class="table table-hover" id="searchTable">
                
                    
                    <?php
                        include 'DBManager.php';
                        echo fetch('');
                        
                    ?>
                
            </table>
            
        </div>
    </body>


    <footer class="py-2 bg-dark"> </footer>

</html>
