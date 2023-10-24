<?php include "./partial/menu.php" ?>

    <!-- fOOD sEARCH Section Starts Here -->    
    <section class="foo py-5 ">
            <div class="food-search text-center ">
            <div class="container">
                <form action="food-search.php" method="POST">
                    <br>
                    <br>
                    <br>
                    <br>
                        <input type="search" name="search" placeholder="Search for Food.." required>
                        <input type="submit" value="Search" class="btn btn-primary">
                    <br>
                </form>
            </div>
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
        <section class="categories my-5">
            <div class="container">
                <style>
                    .success{
                        background-color: rgba(255, 0, 0, 0.437);
                        color:white;
                        /* width: max-content; */
                        display:block;
                        text-align: center;
                        padding:20px;
                        border-radius: 12px;
                        margin: 40px auto;
                    }
                    .danger{
                        background-color: #ff6b81;
                        color:white;
                        /* width: max-content; */
                        display:block;
                        text-align: center;
                        padding:20px;
                        border-radius: 12px;
                        margin: 40px auto;
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
                <div class="row">

                
                <?php 
                    while($rows = mysqli_fetch_assoc($result)){ 
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                 ?>
                 <div class="col-md-4 my-4">
                     <a href="category-foods.php?category_id=<?php echo $id; ?>">
                         <div class="float-container">
                             <img src="./images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve" loading="lazy" style="height:400px;object-fit:cover;">
                             <h3 class="float-text text-white fw-bold"><?php echo $title;?></h3>
                         </div>
                     </a>
                 </div>
                <?php } ?>
                </div>

                <div class="clearfix"></div>
            </div>
        </section>
    <?php  } ?>
    <!-- Categories Section Ends Here -->
    <div class="about py-5">
        <div class="container ">
        <h2 class="text-center">About Us</h2>
            <div class="row mb-5">
                <div class="col-md-6 my-3">
                    <img src="./images/resturant.jpg" class="w-100 img-curve" style="object-fit:cover;" alt="">
                </div>
                <div class="col-md-6 my-3 px-4">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
          
                </div>
                
            </div>
        </div>
    </div>
    <!-- =================Start Show 6 Foods================= -->
    <?php 
        $query = "SELECT * FROM tbl_food WHERE featured='Yes' AND active='Yes' LIMIT 6";
        $result = mysqli_query($connect,$query);
    ?>
    <div class="food-menu my-5">
        <div class="container-md">
        <h1 class="text-center">Food Menu</h1>
        <br><br><br>
            <div class="row">
            <?php
                    // echo "hello";
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
                            <p class="fw-bold"><?php echo $price; ?> kr</p>
                            <p class="card-text text-muted"><?php echo $description; ?></p>
                            <a href="./order.php?food_id=<?php echo $id;?>" class="btn-primary p-2 px-4">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php 
                }
                // echo "bye"; 
            ?>
            </div>
        </div>
    </div>
    <!-- =================End Show 6 Foods================= -->



<?php include "./partial/footer.php"; ?>