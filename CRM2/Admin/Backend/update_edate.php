<?php
include_once '../../DB.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "UPDATE `vehicles` SET `e_date`=NOW() WHERE `id`=$id;";
    $rs = mysqli_query($con, $sql);
    header("location: ../add_vehicles.php");
}
?>