<?php             
    $user = 'b40a8424d74314';
    $password = '9261175a';
    $db = 'heroku_bda44d56559823a';
    $host = 'us-cdbr-east-02.cleardb.com';

    $link = mysqli_connect($host, $user, $password, $db);
        if(!$link){
            die("Connection failed: " . mysqli_connect_error());
        }else{
            //echo "Connection succesfull!";
        }
        //$all = " SELECT * FROM eventos ";
        //$list = $link-> query($all);
    ?>