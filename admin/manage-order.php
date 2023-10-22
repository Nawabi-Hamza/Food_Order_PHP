<?php include "./partials/menu.php"; ?>

<!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Order</h1>
            <br><br>
            <!-- <a href="add-order.php" class="btn-primary">Add Order</a> -->
            <br><br>
            <div class="clearfix"></div>
            <?php
                if(isset($_SESSION['order'])){
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
                }

            ?>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order_Date</th>
                        <th>Status</th>
                        <th>Customer_Name</th>
                        <th>Customer_Contact</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM tbl_order ORDER BY id DESC";
                        $result = mysqli_query($connect,$query);
                        $count = mysqli_num_rows($result);
                        if($count > 0){
                            $num = 1;
                            while($rows = mysqli_fetch_assoc($result)){

                    
                    ?>
                    <tr style="font-size:smaller;">
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $rows['food']; ?></td>
                        <td>$<?php echo $rows['price']; ?></td>
                        <td><?php echo $rows['qty']; ?></td>
                        <td>$<?php echo $rows['total']; ?></td>
                        <td><?php echo $rows['order_date']; ?></td>
                        <td style="font-weight:bold;color:
                            <?php if($rows['status']=='Ordered'){echo 'black';};if($rows['status']=='On Delivery'){echo 'orange';}if($rows['status']=='Delivered'){ echo 'green';}if($rows['status']=='Cancel'){ echo 'red';} ?>;">
                            <?php echo $rows['status']; ?>
                        </td>
                        <td><?php echo $rows['customer_name']; ?></td>
                        <td><?php echo $rows['customer_contact']; ?></td>
                        <td><?php echo $rows['customer_email']; ?></td>
                        <td>
                            <a href="./update-order.php?id=<?php echo $rows['id']; ?>" class="btn-secondary" style="padding:10px;">Update_Order</a>
                        </td>
                    </tr>
                   <?php 
                            }
                        } 
                    ?>
                </table>
            <div class="clearfix"></div>
        </div>
    </div>
<!-- Main Content Section End -->

<?php include "./partials/footer.php"; ?>
