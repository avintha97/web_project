<?php

@include './admin/config.php';

session_start();

if(!isset($_SESSION['name'])) {
    header('location:../admin.php');
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
    <title>Admin Dashboard</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="../static/images/uni_logo.jpg" alt="" style="max-width: 35px; max-height:35px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="user.php">Faculty of Geomatics <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <h3 style="color:aqua;"><?php echo $_SESSION['name']; ?></h3>
        <a href="../logout.php" class="btn btn-danger">log out</a>
    </div>
</nav>

<div class="container">
     <br />
     <br />
      <h1>CSV Column Mapping in PHP</h1>
      <br />
        <div id="message"></div>
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Select CSV File</h3>
          </div>
          <div class="panel-body">
            <div class="row" id="upload_area">
              <form method="post" id="upload_form" enctype="multipart/form-data">
                <div class="col-md-6" >Select File</div>
                <div class="col-md-6">
                  <input type="file" name="file" id="csv_file" />
                </div>
                <br /><br /><br />
                <div class="col-md-12" >
                  <input type="submit" name="upload_file" id="upload_file" class="btn btn-primary" value="Upload" />
                </div>
              </form>
              
            </div>
            <div class="table-responsive" id="process_area">

            </div>
          </div>
        </div>
     </div>
</body>

</html>