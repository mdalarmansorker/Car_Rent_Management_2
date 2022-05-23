<?php
include_once '../../DB.php';

// get the post records
	$car = $_POST['Car_ID'];
	$date = $_POST['Date'];
	$reason = $_POST['Reason'];
	$price = $_POST['Price'];
	{
// database insert SQL code
$sql = "INSERT INTO `cost` (`Cdate`,`Reason`,`Price`,`v_id`) VALUES('$date', '$reason', '$price','$car')";
	}
// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	header("location: ../insert_cost.php?error=Inserted Successfully");
}
else
{
	header("location: ../insert_cost.php?error=Something wrong, Please try again.");
}

?>