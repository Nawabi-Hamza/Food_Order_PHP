<?php include "./partial/menu.php" ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="GET">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <?php
        
        $query = "SELECT id,title,image_name FROM tbl_category WHERE featured='Yes' AND active='Yes' order by id desc LIMIT 3 ";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        // print_r(mysqli_fetch_assoc($result));
        if($count < 1){
            echo "there is no category";
        }else{
    ?>
        <section class="categories">
            <div class="container">
                <style>
                    .success{
                        background-color: #47b4d1;
                        color:white;
                        width: max-content;
                        display:block;
                        text-align: center;
                        padding:20px;
                        border-radius: 12px;
                    }
                    .danger{
                        background-color: #ff6b81;
                        color:white;
                        width: max-content;
                        display:block;
                        text-align: center;
                        padding:20px;
                        border-radius: 12px;
                    }
                </style>
                <?php
                    if(isset($_SESSION['order'])){
                        echo $_SESSION['order'];
                        unset($_SESSION['order']);
                    }                    
                ?>
                <!-- <div class='success'>Food order successfuly ...</div> -->
                <h2 class="text-center">Explore Foods</h2>
                <?php 
                    while($rows = mysqli_fetch_assoc($result)){ 
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                 ?>
                    <a href="category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <img src="./images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve" loading="lazy" style="height:500px;object-fit:cover;">
                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                    </a>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
        </section>
    <?php  } ?>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <?php 
        $query = "SELECT * FROM tbl_food WHERE featured='Yes' AND active='Yes' LIMIT 6";
        $result = mysqli_query($connect,$query);
    ?>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
                 while($rows = mysqli_fetch_assoc($result)){
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $description = $rows['description'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
             ?>
                
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="./images/foods/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve" style="height:120px;width:120px;object-fit:cover;" loading="lazy">
                    </div>
                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$ <?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="./order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

            
            <?php } ?>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="./foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->


<?php include "./partial/footer.php"; ?>