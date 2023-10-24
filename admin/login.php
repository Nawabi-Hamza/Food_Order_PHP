<?php include "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login | Food Order System</title>
</head>
<body>  
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-3 col-lg-3"></div>
            <div class="col-12 col-md-6 col-lg-4">
                <?php
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    // unset($_SESSION['no-login-message']);
                }
                ?>
                <div class="login py-5 px-4">
                    <h1 class="text-center">Login</h1>
                    <br><br>
                    <!-- Start Form Login -->
                    <form action="" method="POST" >
                        <span class="label">Username:</span> <br>
                        <input type="text" name="username" placeholder="Enter username" required><br><br>
                        <span class="label">Password:</span> <br>
                        <input type="password" name="password" placeholder="Enter Password" required><br><br>
                        <button type="submit" class="btn btn-primary" name="submit">Login</button>
                        <br><br>
                    </form>
                    <!-- End Form Login -->
                    <p class="text-center">Created By - <a href="https://hamza-nawabi.netlify.app">Hamza Nawabi</a></p>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3"></div>
        </div>
    </div>
    
</body>
</html>

<?php
    
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($connect,$_POST['username']);
        $password = mysqli_real_escape_string($connect,md5($_POST['password']));

        $query = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count==1){
            $_SESSION['login'] = "<div class='alert-success py-3 px-4 my-3' style='padding:1%;margin:1% 0;'>Login Successfuly......</div>";
            $_SESSION['user'] = $username;
            header("Location: index.php");
        }else{
            $_SESSION['login'] = "<div class='alert-danger py-3 px-4 my-3' style='padding:1%;margin:1% 0;'>Username and password did not much !</div>";
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

    }

?>

