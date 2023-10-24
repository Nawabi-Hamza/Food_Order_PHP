<?php include "./partials/menu.php"; ?>

<!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
            <div class="clearfix"></div>
            <?php
                if(isset($_SESSION['add-category'])){
                    echo $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                }
                if(isset($_SESSION['delete-category'])){
                    echo $_SESSION['delete-category'];
                    unset($_SESSION['delete-category']);
                }
                if(isset($_SESSION['update-category'])){
                    echo $_SESSION['update-category'];
                    unset($_SESSION['update-category']);
                }




                // Show Categories
                $query = "SELECT * FROM tbl_category";
                $result = mysqli_query($connect,$query);
                if(!$result){
                    echo "Something went wrong !";
                }
                
            ?>
    <!-- Button To Add Admin -->
            <br><br>
            <a href="./add-category.php" class="btn-primary">Add Category</a>
            <br><br><br>
            <div class="table-responsive">

            
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th class="mx-2">Featured</th>
                        <th class="mx-2">Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        $num = 1;
                        while($rows = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php print_r($num++); ?></td>
                        <td><?php print_r($rows['title']); ?></td>
                        <td><img src="../images/category/<?php print_r($rows['image_name']); ?>" style="height:60px;width:100px;object-fit:cover;" alt=""></td>
                        <td class="p-4"><?php if($rows['featured']=="Yes"){ echo "✔️"; }else{ echo "❌"; } ?></td>
                        <td class="p-4"><?php if($rows['active']=="Yes"){ echo "✔️"; }else{ echo "❌"; } ?></td>
                        <td>
                            <a href="./update-category.php?id=<?php echo $rows['id'];?>" class="btn-secondary p-2"><i class="bi bi-pencil-square text-white"></i></a>
                            <a href="./delete-category.php?id=<?php echo $rows['id'];?>&image=<?php echo $rows['image_name'];?>" class="btn-danger p-2"><i class="bi bi-trash text-white"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                   
                </table>
                </div>
            <div class="clearfix"></div>
        </div>
    </div>
<!-- Main Content Section End -->

<?php include "./partials/footer.php"; ?>
