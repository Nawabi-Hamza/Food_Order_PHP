<?php include "./partials/menu.php"; ?>


<div class="min-content">
    <div class="wrapper">
        <h1>Add Food</h1><br><br>
        <!-- start add category -->
            <?php
            ob_start();
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }     
                if(isset($_SESSION['add-food'])){
                    echo $_SESSION['add-food'];
                    unset($_SESSION['add-food']);
                }            
                $query = "SELECT id,title From tbl_category WHERE active='Yes'";
                $result = mysqli_query($connect,$query);
                $count = mysqli_num_rows($result);
                if($count < 1){
                    $_SESSION['add-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Please add category or active one category !</div>";
                    header("Location: manage-category.php");
                }

                
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td><input type="text" name="title" placeholder="Food name" required></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea type="text" name="description" rows="4" cols="21" placeholder="write more about food ... " style="padding:4px;" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><input type="text" name="price" placeholder="price" required></td>
                    </tr>
                    <tr>
                        <td>Image:</td>
                        <td><input type="file" name="image" placeholder="Food name" required ></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category" id="" style="width:170px;">
                               <?php while($rows = mysqli_fetch_assoc($result)){
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
                            <input type="radio" name="feature" value="Yes"> Yes
                            <input type="radio" name="feature" value="No" checked> No
                        </td>
                    </tr>
                    <tr >
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No" checked> No
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <br><br><br>
                        </td>   
                    </tr>

                    <tr >
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food" class="btn-primary" style="padding:2.6% 3%;">
                            <a href="manage-food.php"><input type="button" name="cancel" value="Cancel" class="btn-danger" style="padding:2.6% 3%;"></a>
                        </td>
                    </tr>
                </table>
            </form>
            <!-- end add category -->
    <?php 
        // echo gmdate('Y m d');
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $feature = $_POST['feature'];
            $active = $_POST['active'];
            // Image importent
            $image = $_FILES['image'];
            $image_name = gmdate('Y m d')."_".time()."_".$_FILES['image']['name'];
            $destination = "../images/foods/".$image_name;
            $path_image = $image['tmp_name'];
            // upload image
            $upload = move_uploaded_file($path_image,$destination);
            // $upload = false;
            if($upload){
                $query = "INSERT INTO tbl_food (title,description,price,image_name,category_id,featured,active) VALUES ('$title','$description','$price','$image_name','$category','$feature','$active')";
                $result = mysqli_query($connect,$query);
                $result = true;
                if($result){
                    $_SESSION['add-food'] = "<div class='alert-success' style='padding:1%;margin:1% 0;'>Food Uploaded ...</div>";
                    header("Location:manage-food.php");
                    ob_end_flush();
                }
            }else{
                $_SESSION['upload'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Image does not Uploaded !</div>";
            }
        }
    ?>
    </div>
</div>


<?php include "./partials/footer.php"; ?>