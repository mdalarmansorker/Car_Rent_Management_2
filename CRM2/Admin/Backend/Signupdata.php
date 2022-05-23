<?php
include_once '../../DB.php';


// get the post records
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Password = $_POST['password'];
	$Phone = $_POST['phone'];
	$Gender = $_POST['Gender'];
	$Position = $_POST['Designation'];
	$Division = $_POST['Division'];
	//Checking the datas if input is empty 
	if(empty($Name) || empty($Email) || empty($Password))
    {
        header("Location: ../Sign_up.php?error=Fill up the form");

        exit();
    }
    else{
		//checking the data if the email already exist in the database or not.
		$sql2 = "SELECT * FROM `admin` WHERE `Email`='$Email';";
		$e = mysqli_query($con,$sql2);
		//if email exist it goes to the front page and print email already exist and exit the code
		//run other code otherwise
		if($result = mysqli_fetch_assoc($e))
		{
			header("location: ../Sign_up.php?error=Email Already Exist");
			exit();
		}
// database insert SQL code
//declare the query
$sql = "INSERT INTO `admin` (`Name`,`Email`,`Password`,`Phone`,`Division`,`Gender`,`Designation`) VALUES('$Name', '$Email', '$Password', '$Phone', '$Division','$Gender','$Position')";
	}
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
	header("location: ../Sign_up.php?error=Employee Added Successfully");
}
else
{
	header("location: ../Sign_up.php?error=Something went wrong, please try again.$Phone");
}

?>