<?php

@include 'config.php';

session_start();






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
    <title>My Results</title>
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
                <h3 style="color:aqua;"><?php echo $_SESSION['name']; ?><h5 style="color:white;"><?php echo  $_SESSION['regno']; ?></h5>
                </h3>
                <a href="logout.php" class="btn btn-danger">log out</a>
            </div>
        </nav>

    </div>
    <br>
    <br>
    <div class="col-md-4 ">
        <h1>Year I semester I</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Total Credits</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>

            <?php
            if (isset($_SESSION['regno'])) {
                $regno = pg_escape_string($conn, $_SESSION['regno']);
                $select = "SELECT * FROM public.\"18GES_SEM_1\" WHERE regno = $1";
                $result = pg_query_params($conn, $select, array($regno));
                $t_credit = 0;
                $sem_gpa=0;
                if ($result) {
                    $grades = array();
                    while ($row = pg_fetch_assoc($result)) {
                        foreach ($row as $column => $data) {
                            
                            if (!isset($grades[$column])) {
                                $grades[$column] = null;
                            }
                            $select1 = "SELECT sub_name,total_credits FROM public.\"subjects\" WHERE sub_code = '$column'";
                            $result1 = pg_query($conn, $select1);
                            $row1 = pg_fetch_row($result1);
                            if ($row1) {
                                $credits = $row1[1] !== 'non-credited' ? (int)$row1[1] : 0;
                                
                                            
                                $t_credit += $credits;
                                if ($data) {
                                    $grades[$column] = array($data, $credits);
                                               
                                    echo "<tr>";
                                    echo "<td>" . $column . "</td>";
                                    echo "<td>" . $row1[0] . "</td>";
                                    echo "<td>" . $credits . "</td>";
                                    echo "<td>" . $data . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                    $gpa = calculateGPA($grades, $t_credit);
                } else {
                    echo "Error executing query: " . pg_last_error($conn);
                }
            }
            
            


            function calculateGPA($grades, $totalCredits) {
                $totalPoints = 0;
                $subjectCredits = 0;
            
                foreach ($grades as $grade) {
                    if (!empty($grade)) {
                        $subjectGrade = $grade[0];
                        $subjectCredits = $grade[1];
            
                        switch ($subjectGrade) {
                            case 'A+':
                            case 'A':
                                $points = 4.0;
                                break;
                            case 'A-':
                                $points = 3.7;
                                break;
                            case 'B+':
                                $points = 3.3;
                                break;
                            case 'B':
                                $points = 3.0;
                                break;
                            case 'B-':
                                $points = 2.7;
                                break;
                            case 'C+':
                                $points = 2.3;
                                break;
                            case 'C':
                                $points = 2.0;
                                break;
                            case 'D+':
                                $points = 1.3;
                                break;
                            case 'D':
                                $points = 1.0;
                                break;
                            case 'F':
                                $points = 0.0;
                                break;
                            default:
                                $points = 0.0;
                                break;
                        }
            
                        $totalPoints += $points * $subjectCredits;
                    }
                }
            
                if ($totalCredits > 0) {
                    $gpa = $totalPoints / $totalCredits;
                    return round($gpa, 2);
                } else {
                    return 0;
                }
            }
            
            
            ?>
        </table>
    </div>
    <div class="col-md-6">
        <h1>Total credits : <?php echo $t_credit;?></h1>
        <h1>Sem GPA: <?php echo $gpa;?></h1>
    </div>



</body>

</html>