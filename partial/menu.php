<?php 
        include "./admin/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria - Gigante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="preload"> -->
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <div class="responsive-navbar bg-body-tertiary">
        <div class="container-md">
            <nav class="navbar navbar-expand-md px-1">
                <div class="container-fluid d-flex justify-content-between ">
                    <a class="navbar-brand w-25" href="./index.php">
                        <img src="images/logo.png" alt="Restaurant Logo" class="w-100 logo">
                    </a>
                    <h4 class="navbar-toggler border-0"  data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" ></span>
                    </h4>
                </div>
                <div class="collapse navbar-collapse px-3 px-md-auto mt-4 mt-md-0" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" id="red">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="categories.php" class="nav-link" id="red">Category</a>
                    </li>
                    <li class="nav-item">
                        <a href="foods.php" class="nav-link" id="red">Food</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link" id="red">Contact</a>
                    </li>
                    </ul>
                </div>
             </nav>
        </div>
    </div>
    <!-- Navbar Section End Here -->
     