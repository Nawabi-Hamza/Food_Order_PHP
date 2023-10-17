<?php 
    include "partials/menu.php";
    include "connection.php";


    // Get Data from id 
    $id = $_GET['id'];
    // if id exist then all the page will show
    if($id){

?>


    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin <?php echo $id; ?></h1>
            <div class="clearfix"></div>
            <!-- Button To Add Admin -->
            <br><br>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td colspan='2'>
                            <marquee behavior="deprecated" direction="left">Default Password "admin"</marquee>
                        </td>
                    </tr>
                    <tr>
                        <td>Current Password:</td>
                        <td><input type="password" name="current_password"  placeholder="Old Password "></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input type="password" name="new_password"  placeholder="New Passoword "></td>
                    </tr>
                    <tr >
                        <td>Confirm Password</td>
                        <td><input type="password" name="confirm_password" placeholder="Confirm Password "></td>
                    </tr>
                    <tr >
                        <td>
                            <br><br><br>
                        </td>   
                    </tr>

                    <tr >
                        <td colspan="2">
                            <input type="submit" name="submit" value="Change Password" class="btn-primary" style="padding:2.6% 3%;">
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
    }
    // if id does not exist it redirect to manage admin page
    else{
        header("Location: manage-admin.php");
    }
    // process the form in database
    if(isset($_POST['submit'])){
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        // password encrypt by md5
        // $password = $_POST['password'];
        $query = "SELECT id,password FROM tbl_admin WHERE id='$id' AND password='$current_password'";
        $result = mysqli_query($connect,$query);
        if($result){
            $count = mysqli_num_rows($result);
            // echo $count;
            if($count==1){
                // echo "user found !";
                if($new_password===$confirm_password){
                    $query = "UPDATE tbl_admin SET password='$new_password' WHERE id='$id'";
                    $result = mysqli_query($connect,$query);
                    if($result){
                        $_SESSION['add'] = "Password updated successfuly ...";
                        header("Location: manage-admin.php");
                    }
                }else{
                    $_SESSION['add'] = "Check your confirm password ! ...";
                    echo "<div class='alert-danger' style='padding:1%;'>";
                        echo $_SESSION['add'];
                    echo "</div>";
                    unset($_SESSION['add']);
                }
            }else{
                $_SESSION['add'] = "User did not found !";
                echo "<div class='alert-danger' style='padding:1%;'>";
                    echo $_SESSION['add'];
                echo "</div>";
                unset($_SESSION['add']);
            }
        }        
    }


?>




<?php include "partials/footer.php"; ?>


