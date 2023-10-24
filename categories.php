<?php include "./partial/menu.php"; ?>



    <!-- Categories Section Starts Here -->
    <?php
        $query = "SELECT * FROM tbl_category WHERE active='Yes'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count < 1){
            echo "There is no category !";
        }else{

        
    ?>
    <section class="categories my-5">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <div class="row">

            
            <?php
                while($rows = mysqli_fetch_assoc($result)){
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image_name = $rows['image_name'];                   
                
            ?>
            <div class="col-md-4 my-3">
                <a href="./category-foods.php?category_id=<?php echo $id; ?>">
                <div class=" float-container">
                    <img src="./images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve" style="height:350px;object-fit:cover; ">
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                </div>
                </a>
            </div>
            <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <?php } ?>
    <!-- Categories Section Ends Here -->




<?php include "./partial/footer.php"; ?>
