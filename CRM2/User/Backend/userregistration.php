<?php

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','crm2');



// get the post records
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Password = $_POST['pswd'];
	$Phone = $_POST['phone'];
		//checking the data if the email already exist in the database or not.
		$sql = "SELECT * FROM `users` WHERE `email`='$Email' or `phone`='$Phone';";
		$e = mysqli_query($con,$sql);
		if($result = mysqli_fetch_assoc($e))
		{
			header("location: ../home.php?error=Email/Phone Number Already Exist");
			exit();
		}
// database insert SQL code
//declare the query
$sql = "INSERT INTO `users` (`name`,`email`,`password`,`phone`) VALUES('$Name', '$Email', '$Password', '$Phone')";
	
// insert in database 
//run the query
$rs = mysqli_query($con, $sql);

if($rs)
{
	/*echo "Signing up successfull.\n";
	echo "Thank you ".$firstname." ".$lastname;
	echo "<br>";
	echo "Now you can log in to your account.";
	echo "<br>";*/
	header("location: ../home.php?error=Sign up completed");
}
else
{
	header("location: ../home.php?error=Something went wrong, please try again");
}

?>