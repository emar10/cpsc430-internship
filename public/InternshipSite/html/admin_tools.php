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
    function unflag(reviewID) 
    {
      $.ajax({
        url:"unflag_review.php",
        type: "POST",
        data: ({id: reviewID}),
        success:function(result) {
          alert(result);
        }
      });
    }

    function deleteReview(reviewID) 
    {
      $.ajax({
        url:"delete_review.php",
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
            <a class="dropdown-item" href="admin_tools.php"><h3>Administrator Tools</h3></a>
          </div>
        </div>
    </div> <!-- img-fluid will scaled images to the size of their parent -->
      <div class="col-sm-3"><h1 class="img-fluid">Internships</h1></div>
      <div class="col-sm-4"></div>
      <div class="col-sm-4"></div>
    </div>
</div>

<div class="jumbotron main"> <!-- jumbotron acts like a big screen, and anything inside of it is fit to its dimensions -->
  <div class="container-fluid"> <!-- normally this would watch screen-width, but since it's in a jumbotron, it only matches jumbotron width -->
    <div><center><h1>Administrator Tools</h1></center></div>
    <h2>Flagged Reviews</h2>
    <div>
      <table class="table table-white">
        <tr>
          <th scope="col" width="20%">Employer</th>
          <th scope="col" width="10%">Score</th>
          <th scope="col" width="60%">Comments</th>
          <th scope="col"></th>
        </tr>
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
            $sql = "SELECT employerID, reviewID, score, comments FROM review WHERE flagged=1";
            $result = mysqli_query($conn, $sql) or die('error getting review data');
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
              //Find employer name using employerID from review
              $sqlName = "SELECT name from employer WHERE employerID =".$row['employerID']."";
              $nameResult = mysqli_query($conn, $sqlName) or die('error getting employer name data');
              $n = mysqli_fetch_array($nameResult,MYSQLI_ASSOC);
              $employerName = $n['name'];

              echo "<tr><td>";
              echo $employerName;
              echo "</td><td>";
              echo $row['score'];
              echo "</td><td>";
              echo $row['comments'];
              echo "</td>";
              echo "<td>
                      <button type=\"button\" onclick=\"unflag(".$row['reviewID'].")\">Unflag</button>
                    </td>
                    <td>
                      <button type=\"button\" onclick=\"deleteReview(".$row['reviewID'].")\">Delete</button>
                    </td>
                  </tr>";
            }
          echo "</table>";
          }
        ?>
    </div>
  </div>
</div>
</body>
</html>
