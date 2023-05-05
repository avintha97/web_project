<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['regno'])) {
    header('location:login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>User Dashboard</title>
</head>

<body>

<div class="container col-md-12">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="./static/images/uni_logo.jpg" alt="" style="max-width: 35px; max-height:35px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="user.php">Faculty of Geomatics <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <h3 style="color:aqua;"><?php echo $_SESSION['name']; ?><h5 style="color:white;"><?php echo  $_SESSION['regno'];?></h5></h3>
        <a href="logout.php" class="btn btn-danger">log out</a>
    </div>
</nav>

</div>
    <div class="contianer">
        <div class="row">
            <div class="row row-cols-3 g-3">
                <div class="col">
                    <div class="card">
                       
                        <div class="card-body">
                            <h5 class="card-title">Year I Semester I</h5>
                            <p class="card-text">
                            <a href="result.php"><button class="btn btn-success"> view my results</button></a> 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        
                        <div class="card-body">
                            <h5 class="card-title">Year I Semester II</h5>
                            <p class="card-text">
                            <a href="result.php"><button class="btn btn-success"> view my results</button></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        
                        <div class="card-body">
                            <h5 class="card-title">Year II Semester I</h5>
                            <p class="card-text"> <a href="result.php"><button class="btn btn-success"> view my results</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to
                                additional content.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/046.webp" class="card-img-top" alt="Skyscrapers" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/050.webp" class="card-img-top" alt="Skyscrapers" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>