<?php 
    // Start Session
    session_start();
    // define("SITEURL","http://localhost/food_order/");
    // Connect DATABASE
    define("hostname","localhost");
    define("username","root");
    define("password","");
    define("database","food_order");
    $connect = mysqli_connect(hostname,username,password,database);
    if(!$connect){
        die("error : something went wrong");
    }


?>