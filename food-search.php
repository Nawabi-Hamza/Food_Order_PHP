<?php include "./partial/menu.php"; ?>

<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
                $search = mysqli_real_escape_string($connect,$_GET['search']);
                if($search == ""){
                    header("Location: index.php");
                }else{

                
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                <?php 
                    // unset($_SESSION['search']);
                    
                    // $_SESSION['search'] = $search;
                    // $data = $_SESSION['search'];
                    $query = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
                    $result = mysqli_query($connect,$query);
                    $count = mysqli_num_rows($result);
                    if($count < 1){
                        echo 'this food is not exist .....';
                        // echo 'Come soon for this food .....';
                    }
                    while($rows = mysqli_fetch_assoc($result)){

                    
                ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="./images/foods/<?php echo $rows['image_name']; ?>" alt="Chicke Hawain Pizza" style="height:130px;object-fit:cover;" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $rows['title']; ?></h4>
                    <p class="food-price">$ <?php echo $rows['price']; ?></p>
                    <p class="food-detail">
                    <?php echo $rows['description']; ?>
                    </p>
                    <br>

                    <a href="./order.php?food_id=<?php echo $rows['id'];?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php 
            }
            
        }
            ?>

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->



    <?php include "./partial/footer.php"; ?>