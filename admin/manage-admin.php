<?php include "partials/menu.php"; ?>
<?php
    // include "connection.php";

    $query = "SELECT id,full_name,username FROM tbl_admin";
    $result = mysqli_query($connect,$query);
    if(!$result){
        echo "Something went wrong !";
    }
?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <?php 
                // echo $_SESSION['add'];
                if(isset($_SESSION['add'])){
                    echo "<div class='alert-success' style='padding:1%;margin:1% 0;'>";
                    echo $_SESSION['add'];
                    echo "</div>";
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete'])){
                    echo "<div class='alert-success' style='padding:1%;margin:1% 0;'>";
                    echo $_SESSION['delete'];
                    echo "</div>";
                    unset($_SESSION['delete']);
                }
             
                     
             ?>
            <h1>Manage Admin</h1>
            <div class="clearfix"></div>
            <!-- Button To Add Admin -->
            <br><br>
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br><br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $n1 = 1;
                        while($rows = mysqli_fetch_assoc($result)){
                            
                    ?>
                    <tr>
                        <td><?php print_r($n1++) ?></td>
                        <td><?php print_r($rows['full_name']) ?></td>
                        <td><?php print_r($rows['username']) ?></td>
                        <td>
                            <a href='update-password.php?id=<?php print_r($rows['id']) ?>' class='btn-primary'>Change Password</a>
                            <a href='update-admin.php?id=<?php print_r($rows['id']) ?>' class='btn-secondary'>Update Admin</a>
                            <a href='delete-admin.php?id=<?php print_r($rows['id']) ?>' class='btn-danger'>Delete Admin Admin</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>                  
                </table>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section End -->

   

<?php include "partials/footer.php"; ?>
