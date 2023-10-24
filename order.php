<?php include "./partial/menu.php"; ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="foo py-5 ">
            <?php 
                $id = $_GET['food_id'];
                ob_start();
                if(!$id OR $id == ""){
                    header("Location: foods.php");
                }else{
                    $query = "SELECT * FROM tbl_food WHERE id=$id";
                    $result = mysqli_query($connect,$query);
                    $count = mysqli_num_rows($result);
                    if($count < 1){
                        header("Location: foods.php");
                        die();
                    }else{
                        $rows = mysqli_fetch_assoc($result);
                    }
                // $qty = $_REQUEST['gty'];
            
            ?>
            <h2 class="text-center text-white">Fill this form to confirm your order</h2>
            <h2 class="text-center text-white">we will contact you.</h2>
            <div class="container">
                <form action="" class="form-control" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset>
                                <legend>Selected Food</legend>
                                <div class="food-menu-img">
                                    <img src="./images/foods/<?php echo $rows['image_name']; ?>" alt="Chicke Hawain Pizza" style="height:250px;object-fit:cover;" class="img-responsive img-curve">
                                </div>
                
                                <div class="food-menu-desc px-3">
                                    <h3 class="my-3"><?php echo $rows['title']; ?></h3>
                                    <input type="hidden" name="food" class="" value="<?php echo $rows['title']; ?>" required>
            
                                    <p class="food-price fw-bolder">Price per: <?php echo $rows['price']; ?> $</p>
                                    <input type="hidden" name="price" class="" value="<?php echo $rows['price']; ?>" required>
            
            
                                    <div class="order-label">Quantity</div>
                                    <input type="number" name="qty" class=" form-control" min='1' value="1" required>
                                    
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 px-3">
                            <fieldset>
                                <legend>Delivery Details </legend>
                                <div class="order-label">Full Name:</div>
                                <input type="text" name="full-name" placeholder="E.g. Hamza Nawabi" class=" form-control" id="form-custom" required>
            
                                <div class="order-label">Phone Number:</div>
                                <input type="tel" name="contact" placeholder="E.g. 93766xxxxxx" class=" form-control" required>
            
                                <div class="order-label">Email:</div>
                                <input type="email" name="email" placeholder="E.g. hamza.nawabi119@gmail.com" class=" form-control" required>
            
                                <div class="order-label">Address:</div>
                                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class=" form-control" required></textarea>
            
                                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary my-4">
                            </fieldset>
                        </div>
                    </div>
                </form>
                <?php } ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

        <?php
                // echo date('Y-m-d H:i:s A');
                // print_r(date('Y-m-d h-m-s'));
                if(isset($_POST['submit'])){
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $order_date = date('Y-m-d h:i:sa');
                    $status = "Ordered"; // ordered , on delivery , delivered , canceled
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                    $query = "INSERT INTO tbl_order ( food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUES ('$food','$price','$qty','$total','$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";
                    $result = mysqli_query($connect,$query);
                    if($result==true){
                        $_SESSION['order'] = "<div class='success'>Your Food is on the way please wait ...</div>";
                        header("Location: index.php");
                        ob_end_flush();
                    }else{
                        $_SESSION['order'] = "<div class='danger'>Field order food !</div>";
                        header("Location: index.php");
                    }
                }
        
        ?>

   
<?php include "./partial/footer.php"; ?>