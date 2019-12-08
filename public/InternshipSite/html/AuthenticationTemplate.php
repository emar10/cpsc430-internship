<?php
//include 'ConfigTemplate.php';

//If statement to determine if connection to MySQL database was successful/unsucessful
//if(!$con){
        //echo "Connection to MySQL database failed";
//}else{
        //echo "Connection to MySQL database successful";
//}

//Start a new session
//session_start();
//Email queried from MySQL database 
$email = $_POST['email'];
//Password queried from MySQL database

$password = $_POST['password'];

$adminEmail = "admin@umw.edu";
$adminPassword = "password";

	if($email == $adminEmail && $password == $adminPassword) {
		//Redirect user to Home page
		header("Location: http://34.74.193.71/html/admin_tools.php");
	}
	else
	{
		header("Location: LoginTemplate.php");
	}

/*
//SQL Statement to find student from Users table
$sql = "SELECT adminID, password FROM administrator WHERE email = '".$email."'";
//SQL query result
$result = mysqli_query($con,$sql);
//Count of how many rows resulted from query
$count = mysqli_num_rows($result);
//If the number of rows from query result is 1
if($count == 1){
	// pulls the only existing row of results
	$arr = mysqli_fetch_row($result);
	// pulls the hashed password, as it is the 3rd entry in the query
	$hashed = $arr[1];
	// check database's hashed password with the input password, hashed
	if($hashed == $password){
		//Session ID is the first element of the array
		$_SESSION['userID'] = $arr[0];
		//Add session id for access level
		$_SESSION['accessLevel'] = 1;
		//Redirect user to Home page
		header("Location: admin_tools.php");	
	} else {
		header("Location: LoginTemplate.php");
	}	
		
} else {
	//Redirect user back to Login page
	header("Location: LoginTemplate.php");
}
*/
?>
