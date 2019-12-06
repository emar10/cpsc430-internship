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
  <a href="#home"><img src="../include/images/home.png" width="15" height = "15"><br>Home</a>
  <a href="#t3"><img src="../include/images/wrench.png" width="15" height = "15"><br>Tools, Tips, and Tricks</a>
  <a href="#intern"><img src="../include/images/briefcase.png" width="15" height = "15"><br>Internships</a>
  <a href="#ctf"><img src="../include/images/flag.png" width="15" height = "15"><br>Capture the Flag</a>
  <a href="#alumni"><img src="../include/images/persons.png" width="15" height = "15"><br>Alumni</a>
  <a href="#research"><img src="../include/images/books.png" width="15" height = "15"><br>Research</a>
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
            <a class="dropdown-item" href="#"><h3>Internship Opportunities</h3></a>
          </div>
        </div>
    </div> <!-- img-fluid will scaled images to the size of their parent -->
      <div class="col-sm-3"><h1 class="img-fluid">Internships</h1></div>
    </div>
</div>

<div class="jumbotron main"> <!-- jumbotron acts like a big screen, and anything inside of it is fit to its dimensions -->
  <div class="container-fluid"> <!-- normally this would watch screen-width, but since it's in a jumbotron, it only matches jumbotron width -->
    <div><center><h1>UMW Computer Science Internships</h1></center></div>
    
    <!-- Employer Table -->
    <div>
      <table class="table table-white">
        <tr>
          <th scope="col" width="40%">Employer</th>
          <th scope="col" width="50%">Location</th>
          <th scope="col"><th>
        </tr>
        <!-- Modify to PHP function which prints rows for each employer in database -->
        <?php
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
            $sql = "SELECT name, location FROM employer";
            $result = mysqli_query($conn, $sql) or die('error getting data');
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
              //$trimmedName = str_replace(' ', '', $row['name']); //used for passing to employer details page
              echo "<tr><td>";
              echo $row['name'];
              echo "</td><td>";
              echo $row['location'];
              echo "</td>";
              echo "<td>
                      <div class=\"dropdown\">
                        <button type=\"button\" class=\"btn\" data-toggle=\"dropdown\">
                          <img src=\"../include/images/arrow.png\" width=\"20\" height=\"20\">
                        </button>
                        <div class=\"dropdown-menu\">
                          <a class=\"dropdown-item\" href=\"employer_details.php?id=".$row['name']."\">View Employer Details</a>
                          <div class=\"dropdown-divider\"></div>
                          <a class=\"dropdown-item\" href=\"add_review.php\">Submit a Review</a>
                          <div class=\"dropdown-divider\"></div>
                          <a class=\"dropdown-item\" onclick=\"\">View on Map</a>
                        </div>
                      </div>
                    </td>
                  </tr>";
            }
          }
        ?>
        <!-- Test Template Row
        <tr>
          <td>SimVentions</td>
          <td>100 Riverside Pkwy, Fredericksburg, VA</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn" data-toggle="dropdown">
                <img src='../include/images/arrow.png' width="20" height="20">
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="employer_details.php">View Employer Details</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="add_review.php">Submit a Review</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="">View on Map</a>
              </div>
            </div>
          </td>
        </tr>
        -->
      </table>
    </div>
    <!-- End of Employer Table -->

  </div>
</div>
</body>
</html>
