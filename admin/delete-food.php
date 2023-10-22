<?php 
    include "./partials/menu.php";
    $id = $_GET['id'];
    $image = $_GET['image'];
    if($id != "" AND $image != ""){
        $query = "SELECT * FROM tbl_food WHERE id=$id AND image_name='$image'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count === 1){
            // delete image first
            $path = "../images/foods/".$image;
            $delete = unlink($path);
            
            $query = "DELETE FROM tbl_food WHERE id=$id";
            $result = mysqli_query($connect,$query);
            // print_r($result);
            if($result==1){
                $_SESSION['delete-food']= "<div class='alert-success' style='padding:1%;margin:1% 0;'>food deleted successfuly ...</div>";
                header("Location: manage-food.php");
            }
            
        }else{
            $_SESSION['delete-food'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>this food does not exist !</div>";
            header("Location: manage-food.php");
        }
    }else{
        $_SESSION['delete-food'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>this is ilegal please cantact to developer !</div>";
        header("Location: manage-food.php");
    }
?>
<?php ?>