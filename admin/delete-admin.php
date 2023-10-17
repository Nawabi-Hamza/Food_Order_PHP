<?php
    include "connection.php";
    // get id to delete
    $id = $_GET['id'];
    $query = "SELECT id FROM tbl_admin WHERE id='$id'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_num_rows($result);
    // if id exist page will show other wise redirect to manage admin
    // start if
    if($id && $row==1){

?>

<?php include "partials/menu.php"; ?>

    <div class="wrapper">
        are you sure want to delete this user ?
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
        header("Location: manage-admin.php");
    }
 // delete query
    if(isset($_POST['delete'])){
        $query = "DELETE FROM tbl_admin WHERE id=$id";
        $res = mysqli_query($connect,$query);
        if($res){
            $_SESSION['delete'] = "User Deleted Successfuly !";
            header("Location: manage-admin.php");

        }else{
            echo "Somthing went wrong !";
        }
        }
            // redirect to manage admin page with message
            if(isset($_POST['cancel'])){
            header("Location: manage-admin.php");
    }
   
 ?>