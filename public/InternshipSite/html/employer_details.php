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
  <!-- Include jQuery library -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <script type="text/javascript">
    function flag(reviewID) 
    {
      $.ajax({
        url:"flag_review.php",
        type: "POST",
        data: ({id: reviewID}),
        success:function(result) {
          alert(result);
        }
      });
    }

  </script>
</head>

<body>

<!-- Container for topnav -->
<div class="topnav">
  <a href="http://35.199.20.205/main.php"><img src="../include/images/home.png" width="15" height = "15"><br>Home</a>
  <a href="http://35.199.20.205/index.php"><img src="../include/images/wrench.png" width="15" height = "15"><br>Tools, Tips, and Tricks</a>
  <a href="http://34.74.193.71/html/internship_home.php"><img src="../include/images/briefcase.png" width="15" height = "15"><br>Internships</a>
  <a href="http://35.226.71.244/index.php"><img src="../include/images/flag.png" width="15" height = "15"><br>Capture the Flag</a>
  <a href="http://35.185.94.134"><img src="../include/images/persons.png" width="15" height = "15"><br>Alumni</a>
  <a href="http://35.245.253.27/Home.php"><img src="../include/images/books.png" width="15" height = "15"><br>Research</a>
</div>

<!-- Container for header -->
<div class="container-fluid"> <!-- container-fluid is a full width container. it scales to the screen width -->
    <div class="row header"> <!-- each row can contain up to 12 columns. no matter what, all col must add up to 12 -->
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
            <a class="dropdown-item" href="LoginTemplate.php"><h3>Administrator Tools</h3></a>
          </div>
        </div>
    </div> <!-- img-fluid will scaled images to the size of their parent -->
      <div class="col-sm-3"><h1 class="img-fluid">Internships</h1></div>
      <div class="col-sm-4"></div>
      <div class="col-sm-4"></div>
    </div>
</div>

<div class="jumbotron main"> <!-- jumbotron acts like a big screen, and anything inside of it is fit to its dimensions -->

      <?php
        $employer = $_GET['id'];
        $host = 'localhost';
        $username = 'cpsc';
        $password = '430';
        $dbname = 'internship';

        $conn = new mysqli($host, $username, $password, $dbname);
        if(mysqli_connect_error())
        {
          die('Connect Error (' . mysqli_connect_errorno() . ')' . mysqli_connect_error());
        } 
        else 
        {
          $sql = "SELECT employerID, name, location, description, website, handshake FROM employer WHERE name = '".$employer."'";
          $result = mysqli_query($conn, $sql) or die('error getting employer data');
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
          {
            //save employerID for use in getting the reviews
            $employerID = $row['employerID'];

            //employer profile section
            echo "<div class=\"employerProfile\">";
            echo "<h2>".$row['name']."</h2>";
            echo "<p class=\"profileHeading\">Address</p>
                  <p>".$row['location']."</p>";
            echo "<p class=\"profileHeading\">Description</p>
                  <p>".$row['description']."</p>";
            echo "<div style=\"display: inline-block;\">
                    <form action=\"".$row['website']."\" target=\"_blank\" style=\"margin-left: 20px; margin-bottom: 20px; margin-right: 10px;\">
                      <input type=\"submit\" value=\"Website\" class=\"submit\"/>
                    </form>
                  </div>";
            echo "<div style=\"display: inline-block;\">
                    <form action=\"".$row['handshake']."\" target=\"_blank\">
                      <input type=\"submit\" value=\"Handshake\" class=\"submit\" />
                    </form>
                  </div>
                  </div>";
          }

          $sqlReviews = "SELECT reviewID, score, comments, pay, startDate, endDate, flagged FROM review WHERE employerID = ".$employerID."";
          $sqlAvgScore = "SELECT AVG(score) FROM review WHERE employerID = ".$employerID."";
          $sqlAvgPay = "SELECT AVG(pay) FROM review WHERE employerID = ".$employerID."";

          $avgScoreResult = mysqli_query($conn, $sqlAvgScore) or die('error getting avgscore data');
          $s = mysqli_fetch_array($avgScoreResult,MYSQLI_ASSOC);
          $avgScore = $s['AVG(score)'];

          $avgPayResult = mysqli_query($conn, $sqlAvgPay) or die('error getting avgpay data');
          $p = mysqli_fetch_array($avgPayResult,MYSQLI_ASSOC);
          $avgPay = $p['AVG(pay)'];
          
          echo "<div class=\"reviewContainer\">";
          echo "<h3>Review Averages</h3>
                  <p><strong>Average Score:</strong> ".number_format($avgScore, 1)."</p>
                  <p><strong>Average Pay:</strong> $".number_format($avgPay, 2)."</p>";
          echo "<h3>Reviews</h3>";

          $resultReview = mysqli_query($conn, $sqlReviews) or die('error getting review data');
          while($row = mysqli_fetch_array($resultReview,MYSQLI_ASSOC))
          {
            echo "<div class=\"reviewBox\">
                    <hr>
                    <p class=\"reviewTitle\">Score: ".$row['score']." Pay: $".number_format($row['pay'], 2)."</p>
                    <p class=\"reviewDate\">".$row['startDate']." - ".$row['endDate']."</p>
                    <hr>
                    <p>".$row['comments']."</p>
                  </div>";
            echo "<button type=\"button\" onclick=\"flag(".$row['reviewID'].")\" style=\"\">Flag Review</button>";
          }

          echo "<center>
                  <form action=\"add_review.php\" style=\"margin-top: 20px; margin-bottom: 20px;\">
                    <input type=\"submit\" value=\"Submit a Review\" class=\"submit\" />
                  </form>
                </center>
                </div>";
        }
      ?>
      <!-- Test Template Employer Profile Section
      <h2>SimVentions</h2>
      <p class="profileHeading">Address</p>
      <p>100 Riverside Pkwy, Fredericksburg, VA</p>
      <p class="profileHeading">Description</p>
      <p>SimVentions is a software company that speializes in lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div style="display: inline-block;">
        <form action="https://www.simventions.com/" target="_blank" style="margin-left: 20px; margin-bottom: 20px; margin-right: 10px;">
          <input type="submit" value="Website" class="submit"/>
        </form>
      </div>
      <div style="display: inline-block;">
        <form action="https://www.joinhandshake.com/" target="_blank">
          <input type="submit" value="Handshake" class="submit" />
        </form>
      </div>
      -->

      <!-- Test Template Reviews Section
      <h3>Review Averages</h3>
      <p><strong>Average Score:</strong> 4.5</p> 
      <p><strong>Average Pay:</strong> $18.50/hr</p>
      <h3>Reviews</h3>
      <div class="reviewBox">
        <hr>
        <p class="reviewTitle">Great Internship — 5/5</p>
        <p class="reviewDate">June 2018 – December 2019</p>
        <hr>
        <p>I had an excellent experience this past summer doing lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <center>
          <form action="add_review.php" style="margin-top: 20px; margin-bottom: 20px;">
              <input type="submit" value="Submit a Review" class="submit" />
          </form>
        </center>
      </div>
      -->
</div>
</body>

</html>
