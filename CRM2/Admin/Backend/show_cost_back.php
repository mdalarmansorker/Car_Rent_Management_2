<?php
include_once '../../DB.php';


// get the post records
	$carid = $_POST['Car_ID'];
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
	{
// database insert SQL code
$sql = "SELECT SUM(Price) FROM `cost` WHERE (`Cdate` BETWEEN '$date1' AND '$date2') AND `v_id`='$carid'";
	}
    

// run the query and return in $rs
$rs = mysqli_query($con, $sql);
//convert the $rs into an array
$data = mysqli_fetch_array($rs);

if($data)
{
	if(!$data[0]==0)
	{		header("location: ../show_cost.php?error=Cost = $data[0] taka");
	}	
	else
	{		header("location: ../show_cost.php?error=0 cost on that day.");
	}
}

else
{
	header("location: ../show_cost.php?error=No cost found!");
}

?>