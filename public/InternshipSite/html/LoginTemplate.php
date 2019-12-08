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
  <link rel="stylesheet" type="text/css" href="../css/Login.css">
  <!-- Website Page Title -->
  <title> Admin Login </title>
</head>

<body>

<div class="jumbotron main"> <!-- jumbotron acts like a big screen, and anything inside of it is fit to its dimensions -->
    <!--Login with Email and Password-->
    <div align="center"><form action="AuthenticationTemplate.php" method="post">
      <!-- Student Login Header -->
      <h1>Admin Login</h1>
	<div>
	    <!--Email Label-->
	    <input type="text" name="email" placeholder="Email" id="email" required>
	    <br></br>
	</div>
	<div>
	    <!--Password Label-->
	    <input type="password" name="password" placeholder="Password" id="password" required>
	    <br></br>
	</div>
	<!-- Login Button -->
	<input class="button btn-primary" name = "login" type="submit" value="Login">
	</form>
    </div>


  </div>
</div>

</body>
</html>
