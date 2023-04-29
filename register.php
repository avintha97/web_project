<?php

@include 'config.php';
//session_start();

if(isset($_POST['submit'])){

    $name = mysqli_escape_string($conn,$_POST['name']);
    $reg_no = mysqli_escape_string($conn,$_POST['reg_no']);
    $password = md5($_POST['password']);
    $rpassword = md5($_POST['rpassword']);

    $select = "SELECT * FROM user WHERE 'id' = '$reg_no' and 'password' = '$password'";

    $result = mysqli_query($conn,$select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists in the database!';
    } else {
        if ($password != $rpassword) {
            $error[] = 'Passwords do not match!';
        } else {
            $insert = "INSERT INTO user (id, name, password, regno) VALUES ('$reg_no', '$name', '$password', '$reg_no')";
            
            mysqli_query($conn, $insert);
            header('Location: login.php');
            exit();
        }
    }
    
    



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
    <title>Register Pages</title>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up forms</p>

                <form class="mx-1 mx-md-4" action="" method="post">
                 <?php
                    
                    if(isset($error)){

                        foreach($error as $error){
                            echo '<span class="badge badge-danger">'.$error.'</span>';
                        }

                    }
                    
                    ?> 

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name='name' id="form3Example1c" class="form-control" placeholder="Eg: A.B.C.FERNANDO" />
                      <label class="form-label" for="form3Example1c">Your Name With Initials</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example3c" name='reg_no' class="form-control" placeholder="Eg:12GES0000"/>
                      <label class="form-label" for="form3Example3c">Registaion Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name='password' id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name='rpassword' id="form3Example4cd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-warning btn-lg">Register</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <p>already have an account ? <a href="login.php">Login </a></p>
                  </div>
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./static/images/uni_logo.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>