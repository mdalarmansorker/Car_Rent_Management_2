<?php

include_once '../../DB.php';

// get the post records
	$s_date = $_POST['Date'];
	$model = $_POST['model'];
    $reg = $_POST['r_no'];
	$type = $_POST['type'];
	{
// database insert SQL code
$sql = "INSERT INTO `vehicles` (`s_date`,`model`,`reg_no`,`type`) VALUES('$s_date', '$model', '$reg','$type')";
	}
// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	header("location: ../add_vehicles.php?error=Vehicle Added Successfully");
}
else
{
	header("location: ../add_vehicles.php?error=Something wrong, Please try again.");
}

?>