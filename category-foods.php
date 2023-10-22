<?php include "./partial/menu.php"; ?>

<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <?php 
            $id = mysqli_real_escape_string($connect,$_GET['category_id']);
            $query = "SELECT id,title FROM tbl_category WHERE id=$id";
            $result = mysqli_query($connect,$query);
            $count = mysqli_num_rows($result);
            if($count < 1){
                header("Location: categories.php");
            }else{
                $rows = mysqli_fetch_assoc($result);
                $query2 = "SELECT * FROM tbl_food WHERE category_id=$id ";
                $result2 = mysqli_query($connect,$query2);
                $count2 = mysqli_num_rows($result2);
                
        ?>
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $rows['title']; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                <?php 
                    if($count2 < 1 OR !$result2){
                        echo "<div class='food-menu-box'>here is no food in this category be patient it will come soon</div><br> ";
                    }else{
                    
                    while($row = mysqli_fetch_assoc($result2)){
                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="./images/foods/<?php echo $row['image_name']; ?>" alt="Chicke Hawain Pizza" style="height:130px;object-fit:cover;" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $row['title']; ?></h4>
                        <p class="food-price">$ <?php echo $row['price']; ?></p>
                        <p class="food-detail">
                        <?php echo $row['description']; ?>
                        </p>
                        <br>

                        <a href="./order.php?food_id=<?php echo $row['id']; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <?php } ?>
            

                <?php   
                        }
                    
                    }
                ?>
            <div class="clearfix"></div>
            
            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    


<?php include "./partial/footer.php"; ?>