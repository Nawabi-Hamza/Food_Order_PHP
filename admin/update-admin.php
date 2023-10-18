<?php 
    include "partials/menu.php";
    // include "connection.php";


    // Get Data from id 
    $id = $_GET['id'];
    // if id exist then show inputs
    // start if
    if($id){
        $query = "SELECT * FROM tbl_admin WHERE id='$id'";
        $result = mysqli_query($connect,$query);
        if($result){
            $count = mysqli_num_rows($result);
            if($count==1){
                // echo "Admin Avalibale";
                $row = mysqli_fetch_assoc($result);
                // print_r($row);
            }else{
                header("Location: manage-admin.php");
            }
        }
?>


    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <div class="clearfix"></div>
            <!-- Button To Add Admin -->
            <br><br>
            
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" placeholder="Enter your name "></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Your username "></td>
                    </tr>
                    <tr >
                        <td>
                            <br><br><br>
                        </td>   
                    </tr>

                    <tr >
                        <td colspan="2">
                            <input type="submit" name="submit" value="Update Admin" class="btn-primary" style="padding:2.6% 3%;">
                            <a href="manage-admin.php"><input type="button" name="cancel" value="Cancel" class="btn-danger" style="padding:2.6% 3%;"></a>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section End -->

<?php
    // end if
    }
    // if id does not exist input does not show go to manage admin
    else{
        header("Location: manage-admin.php");
    }
    // process the form in database
    if(isset($_POST['submit'])){
        $name = $_POST['full_name'];
        $username = $_POST['username'];
        // password encrypt by md5
        // $password = $_POST['password'];
        if(!$name=="" && !$username==""){
            // $password = md5($password);
            $query = "UPDATE tbl_admin SET full_name='$name' , username='$username'  WHERE id='$id'";
            $result = mysqli_query($connect,$query);
            if($result){
                // echo "Created !";
                $_SESSION['add'] = "Update admin successfuly ...";
                header("Location: manage-admin.php");
            }else{
                $_SESSION['add'] = "Field Update Admin ...";
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




<?php include "partials/footer.php"; ?>


