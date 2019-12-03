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
  
  <!-- Script for displaying/hiding the employer information form -->
  <script type="text/javascript">
      function showEmployerDropdown(){
        document.getElementById('employerFields').style.display = 'none';
        document.getElementById('employerDropdown').style.display = 'block';
      }
      function showEmployerFields(){
        document.getElementById('employerDropdown').style.display = 'none';
        document.getElementById('employerFields').style.display = 'inline';
      }
  </script>

</head>

<body>
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
  <div class="container-fluid"> <!-- normally this would watch screen-width, but since it's in a jumbotron, it only matches jumbotron width -->
    <div><center><h1>Submit an Internship Review</h1></center></div>
    
    <!-- Employer Information Form -->
    <div class="employerInfo">
      <h2>Employer Information</h2>
      <input type="radio" name="tab" value="findemployer" checked="checked" class="radio" onclick="showEmployerDropdown();" />Select Existing Employer
      <br>
      <input type="radio" name="tab" value="addemployer" class="radio "onclick="showEmployerFields();" />Input Employer Information Manually
      <div id="employerDropdown" class="dropdownEmployers">
        <center>
        <select style="width: 300px">
          <!-- Modify to PHP function which prints options for each employer in database --> 
          <option>SimVentions</option>
          <!-- Options end -->
        </select>
        </center>
      </div>
      <div id="employerFields" class="employerInfoHidden">
        <p>Employer Name</p>
        <input type="text" class="field" size="30" /> <br>
        <p>Location (street address, city, state) </p>
        <input type="text" class="field" size="40" /> <br>
        <p>Brief Description</p>
        <textarea class="field" rows="3" cols="40"></textarea>
        <p>Website</p>
        <input type="text" class="field" size="30" /> <br>
        <p>Handshake</p>
        <input type="text" class="field" size="30" /> <br>
      </div>
    </div>
    <!-- End of Employer Information Form -->

    <!-- Review Information Form -->
    <div class="reviewInfo">
      <h2>Review</h2>
      <p>Review Title</p>
      <input type="text" class="field" size="30" /> <br>
      <p>Score</p>
      <select class="field">
        <option>Select</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      <p>Pay</p>
      <input type="text" class="field" size="6" /> dollars per hour <br>
      <p>Comments</p>
      <textarea class="field" rows="5" cols="42"></textarea>
      <div style="display: inline-block;">
        <p>Start Date</p>
        <input type="date" class="field" /> <br>
      </div>
      <div style="display: inline-block;">
        <p>End Date</p>
        <input type="date" class="field" /> <br>
      </div>
      <p>Reviewer Email</p>
      <input type="text" class="field" size="30" style="margin-bottom: 20px;" /> <br>
      <center>
        <!-- Captcha goes here -->
        <img src="not-a-robot.png" alt="captcha" width="350" height="100">
        <!-- Submit Button -->
        <form action="review_submitted.php" style="margin-top: 20px; margin-bottom: 20px;">
          <input type="submit" value="Submit Review" class="submit" />
        </form>
        <!-- End of Submit Button -->
      </center>
    </div>
    <!-- End of Review Information Form -->

  </div>
</div>
</body>
</html>
