

<?php include "./partials/menu.php"; ?>



    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">

            <h1>DASHBOARD</h1>
            <br><br><br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    // echo "dsljdflasdkjfldk";
                    unset($_SESSION['login']);
                }   
            ?>
            <div class="clearfix"></div>
                

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Users
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Food
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Orders
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section End -->

<?php include "./partials/footer.php"; ?>
