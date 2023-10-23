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
            <div class="row">
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
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $description = $rows['description'];
                        $image_name = $rows['image_name'];
                        $price = $rows['price'];

                    
                ?>
                    <div class="col-12 col-md-6 col-lg-4 my-2 mx-auto">
                        <div class="card img-thumbnail">
                                <img src="./images/foods/<?php echo $image_name; ?>" class="card-img-top " style="height:12em;width:100%;object-fit:cover;" alt="..." loading="lazy">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between">
                                    <h5 class=" fw-bold"><?php echo $title; ?></h5>
                                    <h5 class="fw-bold" style="color:#ff6b81;"><?php echo $price; ?> kr</h5>
                                </div>
                                <p class="card-text text-muted"><small><?php echo $description; ?></small></p>
                                <a href="./order.php?food_id=<?php echo $id; ?>" class="form-control text-center btn-primary p-2 px-4">Order Now</a>
                            </div>
                        </div>
                    </div>
            <?php 
            }
            
        }
            ?>
            </div>

           

         

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->



    <?php include "./partial/footer.php"; ?>