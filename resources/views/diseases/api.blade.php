<!DOCTYPE html>
<html>
<head>
<title>All Diseases</title>
</head>
<body>

<h1>response</h1> 
<img src="{{ asset("storage")."/diseases/2.jpg" }}" width="200px" > <br>
    <?php
       if(!$json) {
                echo curl_error($ch);
            }
            curl_close($ch);
            print_r(json_decode($json));
    ?>

        
   
</body>
</html>