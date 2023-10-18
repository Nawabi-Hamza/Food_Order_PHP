<?php include "./partials/menu.php"; ?>
<?php 
    if(isset($_GET['id']) AND $_GET['id'] != ''){
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_category WHERE id=$id";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count!==1){
            $_SESSION['delete-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Category does not exist ..</div>";
            header("Location: manage-category.php");
        }
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
    }else{
        $_SESSION['delete-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Category does not exist ..</div>";
        header("Location: manage-category.php");
    }


?>



 <!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <div class="clearfix"></div>
        <!-- Button To Add Admin -->
        <br><br>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Enter your name " required></td>
                </tr>
                <tr>
                    <?php if($row['image_name']){ ?>
                        <td>Current Image:</td>
                        <td><img src="../images/category/<?php print_r($row['image_name']); ?>" style="height:170px;width:100%;object-fit:cover;" alt=""></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td><input type="file" name="new_image" value="" placeholder="Your username "></td>
                </tr>
                <tr >
                    <td>Feature:</td>
                    <td>
                        <input type="radio" name="feature" value="Yes" <?php if($row['featured']=="Yes"){print("checked");}  ?> > Yes
                        <input type="radio" name="feature" value="No" <?php if($row['featured']=="No"){print("checked");}  ?> > No
                    </td>
                </tr>
                <tr >
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" <?php if($row['active']=="Yes"){print("checked");}  ?> > Yes
                        <input type="radio" name="active" value="No" <?php if($row['active']=="No"){print("checked");}  ?> > No
                    </td>
                </tr>
                <tr >
                    <td>
                        <br><br><br>
                    </td>   
                </tr>
                <tr >
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Category" class="btn-primary" style="padding:2.6% 3%;">
                        <a href="manage-category.php"><input type="button" name="cancel" value="Cancel" class="btn-danger" style="padding:2.6% 3%;"></a>
                    </td>
                </tr>
            </table>
        </form>
        <div class="clearfix"></div>
    </div>
</div>
    <!-- Main Content Section End -->

<?php
    if(isset($_POST['submit'])){
        // echo "hello add ...";
        $category_id = $_GET['id'];
        $title = $_POST['title'];
        $image = $_FILES['new_image'];
        $feature = $_POST['feature'];
        $active = $_POST['active'];
        // print_r( $image);
        if($image['name']){
            // echo "update image";
            $remove_before_image = "../images/category/".$row['image_name'];
            $remove_hard = unlink($remove_before_image);
            $image_name = $image['name'];
            $image_src = $image['tmp_name'];
            $path = "../images/category/".$image_name;
            // echo $remove_before_image;
            $uplaod = move_uploaded_file($image_src,$path);
            if(!$upload){
                $_SESSION['update-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>image does not uploaded </div>";
                header("Location: manage-category.php");
            }
            $query = "UPDATE tbl_category SET title='$title' , image_name='$image_name' , featured='$feature' , active='$active' WHERE id=$category_id";
            
        }else{
            $query = "UPDATE tbl_category SET title='$title' , featured='$feature' , active='$active'  WHERE id=$category_id";
        }

        $result = mysqli_query($connect,$query);
        if($result){
            $_SESSION['update-category'] = "<div class='alert-success' style='padding:1%;margin:1% 0;'>Category Updated Successfuly ...</div>";
            header("Location: manage-category.php");
        }else{
            $_SESSION['update-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Category does not updated </div>";
            header("Location: manage-category.php");
        }

    }
?>



<?php include "./partials/footer.php"; ?>