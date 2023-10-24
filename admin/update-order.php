<?php include "./partials/menu.php"; ?>

    <?php 
        $id = $_GET['id'];
        ob_start();
        if($id==""){
            header("Location: manage-order.php");
            die();
        }
        $query = "SELECT * FROM tbl_order WHERE id=$id";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count != 1){
            $_SESSION['order'] = "<div class='alert-danger' style='padding:1%;margin:1% 0;'>this order is not exist !</div>";
            header("Location: manage-order.php");
            die();
        }
        $row = mysqli_fetch_assoc($result);

    ?>

<div class="min-content">
    <div class="wrapper">
        <br><br><h1>Update Order</h1><br><br>
       <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Food name:</td>
                    <td><?php print_r($row['food']); ?></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><?php print_r($row['price']); ?> kr</td>
                </tr>
                <tr>
                    <td>Qty:</td>
                    <td><input type="number" min='1' value="<?php print_r($row['qty']); ?>" name="qty" placeholder="" required ></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>
                        <select name="status" id="" style="width:170px;" required>
                            <option value="Ordered" >Ordered</option>
                            <option value="On Delivery">On Delivery</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                    <td><input type="text" value="<?php print_r($row['customer_name']); ?>" name="customer_name" placeholder="" required ></td>
                </tr>
                <tr>
                    <td>Customer Contact:</td>
                    <td><input type="text" value="<?php print_r($row['customer_contact']); ?>" name="customer_contact" placeholder="" required ></td>
                </tr>
                <tr>
                    <td>Customer Email:</td>
                    <td><input type="email" value="<?php print_r($row['customer_email']); ?>" name="customer_email" placeholder="" required ></td>
                </tr>
                <tr>
                    <td>Customer Address:</td>
                    <td><textarea type="text"  name="customer_address" rows="4" cols="21" placeholder="write more about food ... " style="padding:4px;" required><?php print_r($row['customer_address']); ?></textarea></td>
                </tr>
                <tr>
                    <th>Total Pay:</th>
                    <th><?php echo $row['price']*$row['qty']; ?> kr</th>
                    <input type="hidden" name="price" value="<?php print_r($row['price']); ?>">
                </tr>
                <tr >
                    <td>
                        <br><br><br>
                    </td>   
                </tr>

                <tr >
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php print_r($row['id']); ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-primary" style="padding:2.6% 3%;">
                        <a href="manage-order.php"><input type="button" name="cancel" value="Cancel" class="btn-danger" style="padding:2.6% 3%;"></a>
                    </td>
                </tr>
            </table>
       </form>    
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $price * $qty;
        $status = $_POST['status'];

        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        $query2 = "UPDATE tbl_order SET price='$price' , qty='$qty' , total='$total' , status='$status' , customer_name='$customer_name' , customer_contact='$customer_contact' , customer_email='$customer_email' , customer_address='$customer_address' WHERE id=$id ";
        $result = mysqli_query($connect,$query2);
        if($result){
            $_SESSION['order'] = "<div class='alert-success' style='padding:1%;margin:1% 0;'>order updated successfuly ...</div>";
            header("Location: manage-order.php");
            ob_end_flush();
        }
    }
?>

<?php include "./partials/footer.php"; ?>