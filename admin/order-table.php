

            <table class="tbl-full table-bordered table-stripped table-hover">
                    <thead class="bg-white">
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
                    </thead>
                    <tbody>
                    <?php 
                        $connect = mysqli_connect("localhost","root","","food_order");
                        $query = "SELECT * FROM tbl_order ORDER BY id DESC";
                        $result = mysqli_query($connect,$query);
                        $count = mysqli_num_rows($result);
                        if($count > 0){
                            $num = 1;
                            while($rows = mysqli_fetch_assoc($result)){                    
                    ?>
                    <tr style="font-size:smaller;" class="<?php if($rows['status']=='Ordered'){ echo 'bg-light';} ?>">
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $rows['food']; ?></td>
                        <td><?php echo $rows['price']; ?> KR</td>
                        <td><?php echo $rows['qty']; ?></td>
                        <td><?php echo $rows['total']; ?> KR</td>
                        <td><?php echo $rows['order_date']; ?></td>
                        <td style="font-weight:bold;color:
                            <?php if($rows['status']=='Ordered'){echo 'black';};if($rows['status']=='On Delivery'){echo 'orange';}if($rows['status']=='Delivered'){ echo 'green';}if($rows['status']=='Cancel'){ echo 'red';} ?>;">
                            <?php echo $rows['status']; ?>
                        </td>
                        <td><?php echo $rows['customer_name']; ?></td>
                        <td><?php echo $rows['customer_contact']; ?></td>
                        <td><?php echo $rows['customer_email']; ?></td>
                        <td>
                            <a href="./update-order.php?id=<?php echo $rows['id']; ?>" class="btn-secondary" style="padding:10px;"><i class="bi bi-pencil-square text-white"></i></a>
                        </td>
                    </tr>
                   <?php 
                            }
                        } 
                    ?>
                    </tbody>
                </table>