<?php
include_once '../../DB.php';
if(isset($_GET['id']))
{
    ?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>Confermation</title>
        </head>
        <body>
            
        </body>
    </html>
    <?php
    $id = $_GET['id'];
    $sql = "UPDATE `vehicles` SET `e_date`=NOW() WHERE `id`=$id;";
    $rs = mysqli_query($con, $sql);
    header("location: ../add_vehicles.php");
}
?>