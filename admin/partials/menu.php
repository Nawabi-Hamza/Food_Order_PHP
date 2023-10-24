<?php
    include "connection.php";
    include "login-check.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Pizzeria Gigante - Dashboard</title>
</head>
<body onload="table();">
    <!-- Menu Section Start -->
    <div class="menu text-center">
        <div class="wrapper">
            <?php 
                $query = "SELECT status FROM tbl_order;";
                $result = mysqli_query($connect,$query);
            ?>
            <ul>
                <li><a href="../index.php" style="font-size:1.4rem;">🏚️</a></li>
                <li><a href="index.php">Payroll</a></li>
                <li><a href="manage-admin.php">Admin Manager</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                
                <li ><a href="manage-order.php" id="order"  style="border-raduis:14px;" class="<?php 
                    while($rows = mysqli_fetch_assoc($result)):
                        if($rows['status']=="Ordered"){
                            echo "bg-danger p-2 rounded text-white";  
                            break;
                        }
                    endwhile;
                ?>">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            
        </div>
    </div>
    <!-- Menu Section End -->
