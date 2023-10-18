<?php
    include "./partials/menu.php";
    if(isset($_GET['id']) AND isset($_GET['image'])){
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
    }else{
        header("Location: manage-category.php");
    }

?>