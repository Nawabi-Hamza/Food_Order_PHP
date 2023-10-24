

<?php include "./partials/menu.php"; ?>



    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="container">
        <h1>DASHBOARD</h1>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }   
            ?>
            <br><br><br>
            <div class="row gap-2 d-flex justify-content-around">
                <div class="col-11 col-sm-5 col-md-3 col-lg-2 text-center bg-white py-4">
                    <?php 
                        $query = "SELECT id FROM tbl_category";
                        $result = mysqli_query($connect,$query);
                        $count = mysqli_num_rows($result)
                    ?>
                    <h1><?php echo $count; ?></h1>
                    <br>
                        Categories
                </div>
                <div class="col-11 col-sm-5 col-md-3 col-lg-2 text-center bg-white py-4">
                    <?php 
                        $query2 = "SELECT id FROM tbl_food";
                        $result2 = mysqli_query($connect,$query2);
                        $count2 = mysqli_num_rows($result2)
                    ?>
                    <h1><?php echo $count2; ?></h1>
                    <br>
                        Food
                </div>
                <div class="col-11 col-sm-5 col-md-3 col-lg-2 text-center bg-white py-4">
                    <?php 
                        $query3 = "SELECT id FROM tbl_order";
                        $result3 = mysqli_query($connect,$query3);
                        $count3 = mysqli_num_rows($result3)
                    ?>
                    <h1><?php echo $count3; ?></h1>
                    <br>
                        Total Order
                </div>
                <div class="col-11 col-sm-5 col-md-3 col-lg-2 text-center bg-white py-4">
                    <?php 
                        $query4 = "SELECT SUM(total) as Total FROM tbl_order WHERE status='Delivered'";
                        $result4 = mysqli_query($connect,$query4);
                        $row4 = mysqli_fetch_assoc($result4);
                        $total_revenue = $row4['Total'];
                    ?>
                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br>
                        Revenue Generated
                </div>
            </div>
        </div>

            
            
    </div>
    <!-- Main Content Section End -->

<?php include "./partials/footer.php"; ?>
