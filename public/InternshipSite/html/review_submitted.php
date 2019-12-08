<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- Bootstrap 4; Sets initial zoom level and sets the width to the screen width of the viewing device -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Imports Google Font Open-Sans -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <!-- General Stylesheet Link -->
  <link rel="stylesheet" type="text/css" href="../css/BootstrapTemplate.css">
  <!-- Internship Website Stylesheet Link -->
  <link rel="stylesheet" type="text/css" href="../css/InternshipStyle.css">
</head>

<body>

<!-- Container for topnav -->

<div class="topnav">
  <a href="http://35.199.20.205"><img src="../include/images/home.png" width="15" height = "15"><br>Home</a>
  <a href="http://35.199.20.205/index.php"><img src="../include/images/wrench.png" width="15" height = "15"><br>Tools, Tips, and Tricks</a>
  <a href="http://34.74.193.71/html/internship_home.php"><img src="../include/images/briefcase.png" width="15" height = "15"><br>Internships</a>
  <a href="http://35.226.71.244/index.php"><img src="../include/images/flag.png" width="15" height = "15"><br>Capture the Flag</a>
  <a href="http://35.185.94.134"><img src="../include/images/persons.png" width="15" height = "15"><br>Alumni</a>
  <a href="http://35.245.253.27/Home.php"><img src="../include/images/books.png" width="15" height = "15"><br>Research</a>
</div>

<div class="container-fluid">
    <div class="row header">
      <div class="col-sm-1">
        <div class="dropdown">
          <button type="button" class="btn" data-toggle="dropdown">
            <img src='../include/images/burger-menu.jpg' class='img-fluid'>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="internship_home.php"><h3>Home</h3></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="add_review.php"><h3>Submit an Internship Review</h3></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><h3>Internship Opportunities</h3></a>
          </div>
        </div>
    </div>
      <div class="col-sm-3"><h1 class="img-fluid">Internships</h1></div>
      <div class="col-sm-4"></div>
      <div class="col-sm-4"></div>
    </div>
</div>

<div class="jumbotron main">
  <div class="container-fluid">

<!--- Start for php --->
<?php
  $employerName = filter_input(INPUT_POST, 'name');
  $employerLocation = filter_input(INPUT_POST, 'loc');
  $employerDesc = filter_input(INPUT_POST, 'desc');
  $employerHandshake = filter_input(INPUT_POST, 'handshake');
  $employerWebsite = filter_input(INPUT_POST, 'url');

//review variables:
  $reviewScore = filter_input(INPUT_POST, 'score');
  $salary = filter_input(INPUT_POST, 'pay');
  $reviewComments = filter_input(INPUT_POST, 'comment');
  $startD = filter_input(INPUT_POST, 'start');
  $endD = filter_input(INPUT_POST, 'end');
  $reviewerEmail = filter_input(INPUT_POST, 'email');

//determining the selection variable
  //$determine = filter_input(INPUT_POST, 'tab'); //do select with employer
  $determinetwo = filter_input(INPUT_POST, 'tabtwo');// do without selecting employer
  $employerChosen = filter_input(INPUT_POST, 'employer'); 
//captcha variables
  $captcha;
  if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
//code for captcha
  if(!$captcha){
    echo '<center><h2>Please check the captcha form.</h2></center>';
    exit;
  }
  $secretKey="6LdRhcYUAAAAAA_kA3lbjh4VREdOUhnkc_jBeEMc";
  $ip = $_SERVER['REMOTE_ADDR'];
  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  $response = file_get_contents($url);
  $responseKeys = json_decode($response,true);
        // should return JSON with success as true

  if($responseKeys["success"]){


//if employer is not selected you do all of this

if($determinetwo == "addemployer"){
    if(!empty($employerName)){
    if(!empty($employerLocation)){
      if(!empty($employerDesc)){
        if(!empty($employerHandshake)){
          if(!empty($employerWebsite)){
            if(!empty($reviewScore)){
              if(!empty($salary)){
                if(!empty($reviewComments)){
                  if(!empty($startD)){
                    if(!empty($endD)){
                      if(!empty($reviewerEmail)){
                        $host = "localhost";
                        $username = "cpsc";
                        $password = "430";
                        $dbname = "internship";

                        //create connection
                        $conn = new mysqli ($host, $username, $password, $dbname);
                        if(mysqli_connect_error()){
                          die('Connect Error ('.mysqli_connect_errorno().')' .mysqli_connect_error());
                        }else{

              // YOU MIGHT WANT TO CHECK IF THE EMPLOYER EXISTS

                          $sqlEmployer = "INSERT INTO employer (name, location, description, handshake, website) VALUES ('$employerName', '$employerLocation', '$employerDesc', '$employerHandshake', '$employerWebsite')";
                          if($conn->query($sqlEmployer)){
                          }else{
                            echo "Error: ". $sqlEmployer . "<br>". $conn->error;
                          }

                          $sqlReview = "INSERT INTO review (employerID, score, comments, pay, startDate, endDate, verified, flagged, emailaddress) SELECT employer.employerID, '$reviewScore', '$reviewComments', '$salary', '$startD', '$endD', 0, 0, '$reviewerEmail' FROM employer WHERE name='$employerName'";

                          if($conn->query($sqlReview)){
                            echo "<div><center><h1>Review Submitted!</h1></center></div>";
                          }else{
                            echo "Error: ". $sqlReview . "<br>". $conn->error;
                          }
                          $conn->close();//close db connection
                        } //end of mysql statements

                      }else{
                        echo "<div><center><h1>Email Required <br>Fill In All Fields</h1></center></div>";
                        die();
                      }
                    }else{
                      echo "<div><center><h1>End Date Required <br>Fill In All Fields</h1></center></div>";
                      die();
                    }
                  }else{
                    echo "<div><center><h1>Start Date Required <br>Fill In All Fields</h1></center></div>";
                    die();
                  }

                }else{
                  echo "<div><center><h1>Comment Required <br>Fill In All Fields</h1></center></div>";
                  die();
                }

              }else{
                echo "<div><center><h1>Pay Required <br>Fill In All Fields</h1></center></div>";
                die();
              }

            }else{
              echo "<div><center><h1>Review Score Required <br>Fill In All Fields</h1></center></div>";
              die();
            }

          }else{
            echo "<div><center><h1>Employer URL Required <br>Fill In All Fields</h1></center></div>";
            die();
          }

        }else{
          echo "<div><center><h1>Handshake Required <br>Fill In All Fields</h1></center></div>";
          die();
        }
      }else{
        echo "<div><center><h1>Employer Description Required <br>Fill In All Fields</h1></center></div>";
        die();
      }

    }else{
      echo "<div><center><h1>Location Required <br>Fill In All Fields</h1></center></div>";
      die();
    }
  }else{ //end of employer name else
   echo "<div><center><h1>Employer Name Required <br>Fill In All Fields</h1></center></div>";
   die();
  }//end of if employer is not selected
}else{ //if employer is selected

            if(!empty($reviewScore)){
              if(!empty($salary)){
                if(!empty($reviewComments)){
                  if(!empty($startD)){
                    if(!empty($endD)){
                      if(!empty($reviewerEmail)){
                        $host = "localhost";
                        $username = "cpsc";
                        $password = "430";
                        $dbname = "internship";

                        //create connection
                        $conn = new mysqli ($host, $username, $password, $dbname);
                        if(mysqli_connect_error()){
                          die('Connect Error ('.mysqli_connect_errorno().')' .mysqli_connect_error());
                        }else{
                          $sqlReview = "INSERT INTO review (employerID, score, comments, pay, startDate, endDate, verified, flagged, emailaddress) SELECT employer.employerID, '$reviewScore', '$reviewComments', '$salary', '$startD', '$endD', 0, 0, '$reviewerEmail' FROM employer WHERE name='$employerChosen'";

                          if($conn->query($sqlReview)){
                            echo "<div><center><h1>Review Submitted!</h1></center></div>";
                            echo "<div><center><h2>Thanks For Your Review!</h1></center></div>";
                          }else{
                            echo "Error: ". $sqlReview . "<br>". $conn->error;
                          }
                          $conn->close(); //close db connection
                        } //end of mysql statements

                      }else{
                        echo "<div><center><h1>Email Required <br>Fill In All Fields</h1></center></div>";
                        die();
                      }
                    }else{
                      echo "<div><center><h1>End Date Required <br>Fill In All Fields</h1></center></div>";
                      die();
                    }
                  }else{
                    echo "<div><center><h1>Start Date Required <br>Fill In All Fields</h1></center></div>";
                    die();
                  }

                }else{
                  echo "<div><center><h1>Comment Required <br>Fill In All Fields</h1></center></div>";
                  die();
                }

              }else{
                echo "<div><center><h1>Pay Required <br>Fill In All Fields</h1></center></div>";
                die();
              }

            }else{
              echo "<div><center><h1>Review Score Required <br>Fill In All Fields</h1></center></div>";
              die();
            }
  //echo "Other option selected";
} //end of employer selected option

}else{
  echo '<center><h2>Spammer!</h2></center>';
}
?>
<!---End of php --->
    <div style="text-align: center;">
      <form action="internship_home.php">
        <input type="submit" value="Return to Internship Home" class="submit" />
      </form>
    </div>

  </div>
</div>
</body>
</html>
