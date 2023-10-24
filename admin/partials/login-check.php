<?php
    
    // check user is loged in or not
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "<div class='alert-danger py-3 px-4 mt-4' style='padding:1%;margin:1% 0;'>Please login to access Admin Panel !</div>";
        header("Location: ./login.php"); //http://localhost/food_order/admin/login.php
    }


?>