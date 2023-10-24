<?php include "./partials/menu.php"; ?>

<!-- Main Content Section Start -->
    <div class="main-content" >
        <div class="wrapper" >
            <h1>Manage Order</h1>
            <style>
                    th{
                        min-width: 80px;
                        width: 300px;
                        overflow: hidden;
                    }
                    th:hover{
                        overflow: visible;
                    }
                    td{
                        width: max-content;
                        overflow-x: hidden;
                    }
            </style>
            <br><br>
            <!-- <a href="add-order.php" class="btn-primary">Add Order</a> -->
            <br><br>
            
            <?php
                if(isset($_SESSION['order'])){
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
                }
                ?>
                <script type="text/javascript">
                    function table(){
                        const xhttp = new XMLHttpRequest();
                        xhttp.onload = function(){ 
                            document.getElementById("table").innerHTML = this.responseText; 
                        }
                        xhttp.open("GET","order-table.php");
                        xhttp.send();
                    }
                    setInterval(()=>{
                        table();
                    },5000)
                </script>
            <div class="table-responsive" id="table">
                
            </div>
            
        </div>
    </div>
<!-- Main Content Section End -->

<?php include "./partials/footer.php"; ?>
