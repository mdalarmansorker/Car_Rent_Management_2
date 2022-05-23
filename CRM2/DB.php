<?php
    $host='localhost';
    $username='root';
    $password='';
    $dbname = "crm2";
    $con=mysqli_connect($host,$username,$password,"$dbname");
    if(!$con)
        {
          die('Could not Connect Server:' .mysql_error());
        }
    // add_vehicles.php & vehicles.php
    $show_vehicles = "SELECT * FROM `vehicles` ORDER BY id ASC;";
?>