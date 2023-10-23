<?php include "./partial/menu.php" ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="GET">
                <br>
                <br>
                <br>
                <br>
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" value="Search" class="btn btn-primary">
                <br>
                <br>
                <br>
                <br>
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
                            <img src="./images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve" loading="lazy" style="height:400px;object-fit:cover;">
                            <h3 class="float-text text-white fw-bold"><?php echo $title;?></h3>
                        </div>
                    </a>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
        </section>
    <?php  } ?>
    <!-- Categories Section Ends Here -->

    <!-- =================Start Show 6 Foods================= -->
    <?php 
        $query = "SELECT * FROM tbl_food WHERE featured='Yes' AND active='Yes' LIMIT 6";
        $result = mysqli_query($connect,$query);
    ?>
    <div class="food-menu">
        <div class="container-md">
        <h1 class="text-center">Food Menu</h1>
        <br><br><br>
            <div class="row">
            <?php
                    while($rows = mysqli_fetch_assoc($result)){
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $description = $rows['description'];
                        $price = $rows['price'];
                        $image_name = $rows['image_name'];
            ?>
                <div class="col-12 col-sm-6 col-lg-4 my-2">
                    <div class="card d-flex justify-content-between" >
                        <img src="./images/foods/<?php echo $image_name; ?>" class="card-img-top" style="height:200px;width:100%;object-fit:cover;" alt="..." loading="lazy">
                        <div class="card-body px-3 mb-3">
                            <h5 class="card-title fw-bold"><?php echo $title; ?></h5>
                            <p class="fw-bold">$ <?php echo $price; ?></p>
                            <p class="card-text text-muted"><?php echo $description; ?></p>
                            <a href="./order.php?food_id=<?php echo $id;?>" class="btn-primary p-2 px-4">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- =================End Show 6 Foods================= -->



<?php include "./partial/footer.php"; ?>