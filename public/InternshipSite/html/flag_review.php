<?php 
	//get reviewID passed in
	$id = $_POST['id'];

	//connect to server
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
		//function to flag a review
    	$sqlFlag = "UPDATE review SET flagged=1 WHERE reviewID=".$id;
    	if ($resultFlag = mysqli_query($conn, $sqlFlag))
    	{
    		echo 'Review Flagged';
    	}
    	else 
   		{
   			echo 'error flagging review $id='.$id;
   		}
   	}
 ?>