<?php include "./partials/menu.php"; ?>


<div class="min-content">
    <div class="wrapper">
        <h1>Update Food</h1><br><br>
        <!-- start add category -->
            <?php
            // ob_start();
            ob_start();
                if(isset($_SESSION['update-food'])){
                    echo $_SESSION['update-food'];
                    unset($_SESSION['update-food']);
                }     
                $id = $_GET['id'];
                if($id AND $id != ""){
                    $query = "SELECT * From tbl_food WHERE id=$id";
                    $result = mysqli_query($connect,$query);
                    $count = mysqli_num_rows($result);
                    if($count < 1){
                        $_SESSION['upadate-food'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Please add food !</div>";
                        header("Location: manage-food.php");
                        die();
                    }
                    $row = mysqli_fetch_assoc($result);
                    // print_r($row);
                }         
                else{
                    $_SESSION['upadate-food'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Please add food !</div>";
                    header("Location: manage-food.php");
                    die();
                }
                
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td><input type="text" value="<?php print_r($row['title']); ?>" name="title" placeholder="Food name" required></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea type="text" name="description" rows="4" cols="21" placeholder="write more about food ... " style="padding:4px;" required><?php print_r($row['description']); ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><input type="text" value="<?php print_r($row['price']); ?>" name="price" placeholder="price" required></td>
                    </tr>
                    <tr>
                        <td>Current_Image:</td>
                        <td><img src="../images/foods/<?php print_r($row['image_name']); ?>" style="width:170px;" alt=""></td>
                    </tr>
                    <tr>
                        <td>New_Image:</td>
                        <td><input type="file" name="image" placeholder="Food name"  ></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category" id="" style="width:170px;">
                               <?php 
                                    $query = "SELECT id,title FROM tbl_category";
                                    $result2 = mysqli_query($connect,$query);
                                    while($rows = mysqli_fetch_assoc($result2)){
                                        $id = $rows['id'];
                                        $title = $rows['title'];
                                ?> 
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                               <?php 
                                    }
                                ?>  
                            </select>
                        </td>
                    </tr>
                    <tr >
                        <td>Feature:</td>
                        <td>
                            <input type="radio" name="feature" value="Yes" <?php if($row['featured']=="Yes"){ echo "checked"; } ?> > Yes
                            <input type="radio" name="feature" value="No" <?php if($row['featured']=="No"){ echo "checked"; } ?> > No
                        </td>
                    </tr>
                    <tr >
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="Yes" <?php if($row['active']=="Yes"){ echo "checked"; } ?>> Yes
                            <input type="radio" name="active" value="No" <?php if($row['active']=="No"){ echo "checked"; } ?>> No
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <br><br><br>
                        </td>   
                    </tr>

                    <tr >
                        <td colspan="2">
                            <input type="submit" name="submit" value="Update Food" class="btn-primary" style="padding:2.6% 3%;">
                            <a href="manage-food.php"><input type="button" name="cancel" value="Cancel" class="btn-danger" style="padding:2.6% 3%;"></a>
                        </td>
                    </tr>
                </table>
            </form>
            <!-- end add category -->
    <?php 
        // echo $row['image_name'];
        if(isset($_POST['submit'])){
            $id = $_GET['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $feature = $_POST['feature'];
            $active = $_POST['active'];
            // Image importent
            $current_image = $row['image_name'];
            $image = $_FILES['image'];
            // print_r($image);
            if($image['name'] AND $image['name'] != ""){
                $image_name = gmdate('Y m d')."_".time()."_".$image['name'];
                $destination = "../images/foods/$image_name";
                $path_image = $image['tmp_name'];
                // echo $row['image_name'];
                // ==========delete current image===========
                $delete_current_image = unlink("../images/foods/$current_image");
                // ==========upload new image===========
                $upload_new_image = move_uploaded_file($path_image,$destination);
                if($upload_new_image){
                    $query = "UPDATE tbl_food SET title='$title',description='$description',price='$price',image_name='$image_name',category_id='$category',featured='$feature',active='$active' WHERE id=$id";
                    $res = mysqli_query($connect,$query);
                    if($res){
                        $_SESSION['update-food'] = "<div class='alert-success' style='padding:1%;margin:1% 0;'>food updated successfuly ...</div>";
                        header("Location: manage-food.php");
                    }
                }
                


            }
            else{
                $query2 = "UPDATE tbl_food SET title='$title',description='$description',price='$price',category_id='$category',featured='$feature',active='$active' WHERE id=$id";
                    $res2 = mysqli_query($connect,$query2);
                    if($res2){
                        $_SESSION['update-food'] = "<div class='alert-success' style='padding:1%;margin:1% 0;'>food updated successfuly ...</div>";
                        header("Location: manage-food.php");
                        ob_end_flush();
                    }
            }
        }
    ?>
    </div>
</div>


<?php include "./partials/footer.php"; ?>