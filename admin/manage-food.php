<?php include "./partials/menu.php"; ?>

<!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
            <div class="clearfix"></div>
    <!-- Button To Add Admin -->
    <br><br>
            <a href="./add-food.php" class="btn-primary">Add Food</a>
            <br><br><br>
            <?php 
            if(isset($_SESSION['add-food'])){
                echo $_SESSION['add-food'];
                unset($_SESSION['add-food']);
            }
            if(isset($_SESSION['delete-food'])){
                echo $_SESSION['delete-food'];
                unset($_SESSION['delete-food']);
            }
            if(isset($_SESSION['update-food'])){
                echo $_SESSION['update-food'];
                unset($_SESSION['update-food']);
            }   

            $query = "SELECT tbl_food.id, tbl_food.title, tbl_food.description, tbl_food.price, tbl_food.image_name, tbl_food.category_id, tbl_food.featured, tbl_food.active,tbl_category.title as category FROM tbl_food , tbl_category WHERE tbl_food.category_id = tbl_category.id";
            $result = mysqli_query($connect,$query);
            $count = mysqli_num_rows($result);
            if($count < 1){
                echo "No Food ....";
            }else{
                $num = 1;
        ?>
            
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food_Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php while($rows = mysqli_fetch_assoc($result)){ ?>
                    <?php ?>
                    <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php print_r($rows['title']); ?></td>
                        <td><?php 
                                $des = $rows['description'];
                                if(strlen($des)>10){
                                    for($a = 0; $a<=10 ;$a++){
                                        echo $des[$a]; 
                                    }
                                    echo '...';
                                }else{
                                    echo $des;
                                }
                            ?></td>
                        <td><?php print_r($rows['price']); ?> $</td>
                        <td><?php print_r($rows['category']); ?></td>
                        <td><?php if($rows['featured']=="Yes"){ echo "✔️"; }else{ echo "❌"; } ?></td>
                        <td><?php if($rows['active']=="Yes"){ echo "✔️"; }else{ echo "❌"; } ?></td>
                        <td><img src="../images/foods/<?php print_r($rows['image_name']); ?>" style="height:80px;width:80px;object-fit:cover;" alt=""></td>
                        <td>
                            <a href="./update-food.php?id=<?php echo $rows['id']; ?>" class="btn-secondary">Update Food</a>
                            <a href="./delete-food.php?id=<?php echo $rows['id']; ?>&image=<?php echo $rows['image_name'];?>" class="btn-danger">Delete Food</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            <div class="clearfix"></div>
        </div>
    </div>
<!-- Main Content Section End -->

<?php } ?>
<?php include "./partials/footer.php"; ?>
                           