<?php include "partials/menu.php"; ?>


<?php
    // include "connection.php";
    // get id to delete
    $id = $_GET['id'];
    $image_name = $_GET['image'];
    $query = "SELECT id FROM tbl_category WHERE id='$id' AND image_name='$image_name'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_num_rows($result);
    // if id exist page will show other wise redirect to manage admin
    // start if
    if($id && $row==1){

?>


    <div class="wrapper">
        are you sure want to delete this category ?
        <br><br><br>
        <form action="" method="POST">
            <button class="btn-danger" type="submit" name="delete">Yes</button>
            <button class="btn-primary" type="submit" name="cancel" >No</button>
        </form>
    </div>

<?php 
    // end if
    }
    else{
        header("Location: manage-category.php");
    }
 
 
 
    // delete query
    if(isset($_POST['delete']) AND isset($_GET['id']) AND isset($_GET['image'])){
        $id = $_GET['id'];
        $image = $_GET['image'];
        if($image != ''){
            $path = "../images/category/".$image;
            // remove image 
            $remove = unlink($path);
            if($remove){
                $query = "DELETE FROM tbl_category WHERE id=$id";
                $result = mysqli_query($connect,$query);
                if($result){
                    $_SESSION['delete-category'] = "<div class='alert-success' style='padding:1%;margin:1% 0;'>Delete Category Successfuly ..</div>";
                    header("Location: manage-category.php");
                }else{
                    $_SESSION['delete-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Can not Delete Category !</div>";
                    header("Location: manage-category.php");
                }
            }else{
                $_SESSION['delete-category'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>Can not delete category !</div>";
                header("Location: manage-category.php");
            }
            }
    }

   
 ?>


