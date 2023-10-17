<?php
    
    // check user is loged in or not
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Please login to access Admin Panel !</div>";
        header("Location: http://localhost/food_order/admin/login.php"); //http://localhost/food_order/admin/login.php
    }


?>