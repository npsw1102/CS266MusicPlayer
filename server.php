<?php
    $severname =  "localhost";
    $username = "root";
    $password = "";
    $dbname = "cs266";

    //create connetion
    $conn = mysqli_connect($severname, $username, $password, $dbname);

    //check connection
    if(!$conn){
        die("connection Failed".mysqli_connect_error());
    }else{
        
    }

?>