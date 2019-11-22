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
            <a class="dropdown-item" href="#"><h3>Home</h3></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><h3>Submit an Internship Review</h3></a>
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
    <div><center><h1>UMW Computer Science Internships</h1></center></div>
    

    <div>
      <table class="table table-white">
        <tr>
          <th scope="col" width="60%">Employer</th>
          <th scope="col">City</th>
          <th scope="col"><th>
        </tr>
        <tr>
          <td>SimVentions</td>
          <td>Fredericksburg, VA</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn" data-toggle="dropdown">
                <img src='../include/images/arrow.png' width="20" height="20">
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">View Employer Details</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Submit a Review</a>
              </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-2"></div>
      <div class="col-sm-9"></div>
    </div>
  </div>
</div>
</body>

</html>
