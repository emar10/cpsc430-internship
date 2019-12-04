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
      <div class="col-sm-4"></div>
      <div class="col-sm-4"></div>
    </div>
</div>

<div class="jumbotron main"> <!-- jumbotron acts like a big screen, and anything inside of it is fit to its dimensions -->

    <!-- Employer Profile Section -->
    <div class="employerProfile">
      <!-- Modify to PHP function which prints employer information from table. We need to be able to tell which employer was selected on the previous page and populate this section with information from that employer -->
      <h2>SimVentions</h2>
      <p class="profileHeading">Address</p>
      <p>100 Riverside Pkwy #123<br>Fredericksburg, VA 22406</p>
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
      <!-- End of area to modify -->
    </div>
    <!-- End of Employer Profile Section -->

    <!-- Reviews Section -->
    <div class="reviewContainer">
      <h3>Review Averages</h3>
      <!-- Modify to PHP which calculates the average score and pay for the employer -->
      <p><strong>Average Score:</strong> 4.5</p> 
      <p><strong>Average Pay:</strong> $18.50/hr</p>
      <!-- End of area to modify -->

      <h3>Reviews</h3>
      <div class="reviewBox">
        <!-- Modify to PHP function which prints review information for employer reviews in the database -->
        <hr>
        <p class="reviewTitle">Great Internship — 5/5</p>
        <p class="reviewDate">June 2018 – December 2019</p>
        <hr>
        <p>I had an excellent experience this past summer doing lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <!-- End of single review -->

        <!-- Add Review Button -->
        <center>
          <form action="add_review.php" style="margin-top: 20px; margin-bottom: 20px;">
              <input type="submit" value="Submit a Review" class="submit" />
          </form>
        </center>
        <!-- End of Add Review Button -->
      </div>
      <!-- End of Review Section -->
      
    </div>
</div>
</body>

</html>
