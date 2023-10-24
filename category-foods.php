<?php include "./partial/menu.php"; ?>

<!-- fOOD sEARCH Section Starts Here -->
    <section class="text-center">
        <?php 

            $id = mysqli_real_escape_string($connect,$_GET['category_id']);
            for($a=0 ; $a<strlen($id) ; $a++){
                if($id[$a]=="\\" OR $id[$a]==" "){
                    header("Location: categories.php");
                    die();
                }
            }
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
        <div class="search-custom">                
                <h2 >Foods on <a href="#" class="text-color-primary"><?php echo $rows['title']; ?></a></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu my-5">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <div class="row">
                <?php 
                    if($count2 < 1 OR !$result2){
                        echo "<div class='food-menu-box'>here is no food in this category be patient it will come soon</div><br> ";
                    }else{
                        while($rows = mysqli_fetch_assoc($result2)){
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
                <!-- End while else and parant else -->
                <?php   
                            }
                        }
                    }
                ?>
                </div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    


<?php include "./partial/footer.php"; ?>