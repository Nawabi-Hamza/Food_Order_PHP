<?php 
    include "partials/menu.php";
    include "connection.php";
    // process the form in database
    if(isset($_POST['submit'])){
        $name = $_POST['full_name'];
        $username = $_POST['username'];
        // password encrypt by md5
        $password = md5($_POST['password']);
        if(!$name=="" && !$username=="" && !$password==""){
            $query = "INSERT INTO tbl_admin (full_name,username,password) VALUES ('$name','$username','$password')";
            $result = mysqli_query($connect,$query);
            if($result){
                // echo "Created !";
                $_SESSION['add'] = "Add admin successfuly ...";
                header("Location: manage-admin.php");
            }else{
                $_SESSION['add'] = "Field Add Admin ...";
                header("Location: add-admin.php");
                // header("Location: manage-admin.php");
            }
        }
        else{
            $_SESSION['add'] = "Please Fill all fileds ...";
            echo "<div class='alert-danger' style='padding:1%;'>";
                    echo $_SESSION['add'];
            echo "</div>";
            // unset($_SESSION['add']);
        }
    }


?>


    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <div class="clearfix"></div>
            <!-- Button To Add Admin -->
            <br><br>
            
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full_name" placeholder="Enter your name "></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" placeholder="Your username "></td>
                    </tr>
                    <tr >
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Enter your password "></td>
                    </tr>
                    <tr >
                        <td>
                            <br><br><br>
                        </td>   
                    </tr>

                    <tr >
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-primary" style="padding:2.6% 3%;">
                            <a href="manage-admin.php"><input type="button" name="cancel" value="Cancel" class="btn-danger" style="padding:2.6% 3%;"></a>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section End -->


<?php include "partials/footer.php"; ?>


