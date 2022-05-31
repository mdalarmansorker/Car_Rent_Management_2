<?php
include_once '../../DB.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "UPDATE `booking` SET `cancel`=1, `panding`=0 WHERE `id`=$id;";
    $rs = mysqli_query($con, $sql);
    header("location: ../schedule.php");
}
?>