<?php include "./partial/menu.php"; ?>

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
    


    <!-- fOOD MEnu Section Starts Here -->
    <?php 
        $query = "SELECT * FROM tbl_food";
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
                    $image_name = $rows['image_name'];
                    $price = $rows['price'];
            ?>
            
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="./images/foods/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" style="height:130px;object-fit:cover;" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;  ?></h4>
                    <p class="food-price"><?php echo $price;  ?></p>
                    <p class="food-detail">
                        <?php echo $description;  ?>
                    </p>
                    <br>

                    <a href="./order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <?php } ?>


            <div class="clearfix"></div>
            
            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   


    <?php include "./partial/footer.php"; ?>