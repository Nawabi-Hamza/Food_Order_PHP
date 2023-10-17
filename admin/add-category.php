<?php
    include "./partials/menu.php"

?>
    
    <div class="min-content">
        <div class="wrapper">
            <h1>Add Category</h1><br><br>
            <!-- start add category -->
            <?php
                if(isset($_SESSION['add-category'])){
                    echo $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                }
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td><input type="text" name="title" placeholder="Enter your name "></td>
                    </tr>
                    <tr>
                        <td>Image:</td>
                        <td><input type="file" name="image" placeholder="Your username "></td>
                    </tr>
                    <tr >
                        <td>Feature:</td>
                        <td>
                            <input type="radio" name="feature" value="Yes"> Yes
                            <input type="radio" name="feature" value="No"> No
                        </td>
                    </tr>
                    <tr >
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <br><br><br>
                        </td>   
                    </tr>

                    <tr >
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-primary" style="padding:2.6% 3%;">
                            <a href="manage-order.php"><input type="button" name="cancel" value="Cancel" class="btn-danger" style="padding:2.6% 3%;"></a>
                        </td>
                    </tr>
                </table>
            </form>
            <!-- end add category -->
            <?php
                if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $image = $_FILES['image'];
                        if(isset($_POST['feature'])){
                            $feature = $_POST['feature'];
                        }else{
                            $feature = "No";
                        }
                        if(isset($_POST['active'])){
                            $active = $_POST['active'];
                        }else{
                            $active = "No";
                        }
                        // print_r( $image);
                        if(isset($_FILES['image']['name'])){
                            // upload image
                            $image_name = $_FILES['image']['name'];
                            $source_path = $_FILES['image']['tmp_name'];
                            $distination_path = "../images/category/".$image_name;
                            // finally upload image 
                            $upload = move_uploaded_file($source_path,$distination_path);
                            // if image upload 
                            // if image not upload will redirect with error message
                            if(!$upload){
                                $_SESSION['upload'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Image does not Uploaded !</div>";
                                header("Location: add-category.php");
                                die();
                            }


                        }else{
                            $image_name = '';
                        }
                        // die();
                        $query = "INSERT INTO tbl_category (title,image_name,featured,active) VALUES ('$title','$image_name','$feature','$active')";
                        $result = mysqli_query($connect,$query);
                        if($result){
                            $_SESSION['add-category'] = "<div class='alert-success' style='padding:1%;margin:1% 0;'>Add Category Successfuly......</div>";
                            header("Location: manage-category.php");
                        }
                        else{
                            $_SESSION['add-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Field to Add Category !</div>";
                        }
                }
            
            ?>
        </div>
    </div>




<?php include "./partials/footer.php" ?>