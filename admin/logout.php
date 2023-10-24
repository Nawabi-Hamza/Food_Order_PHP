<?php
    include "connection.php";
    
    // destroy session 
    session_destroy(); // unsert $_SESSION['user']

    // redirect to home

    header("Location: ./login.php");


?>