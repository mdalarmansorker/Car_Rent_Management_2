<?php
    if (isset($_POST['price'])){
    include_once '../DB.php';
    $price = $_POST['price'];
    $id = $_POST['id'];
    $panding = 0;
    $update = "UPDATE `booking` SET `price` = '$price' WHERE `id`=$id;";
    $rs = mysqli_query($con, $update);
    $up = "UPDATE `booking` SET `panding` = $panding WHERE `id`=$id;";
    $rs1 = mysqli_query($con, $up);

}
else if (isset($_POST['status'])){
    include_once '../DB.php';
    $id = $_POST['id'];
    $panding = 0;
    $update = "UPDATE `booking` SET `j_status` = 1 WHERE `id`=$id;";
    $rs = mysqli_query($con, $update);

}
?>
<!DOCTYPE html>
<html>
    <head><title>Admin - Schedule</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script>

function panding_request() {
  var x = document.getElementById("panding");
  var y = document.getElementById("upcoming");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
  }
}
function upcoming_schedule() {
  var x = document.getElementById("panding");
  var y = document.getElementById("upcoming");
  if (y.style.display === "none") {
    y.style.display = "block";
    x.style.display = "none";
  } else {
    y.style.display = "none";
  }
}

    </script>
    
        </head>
    <body class="car">
    <!-- Sidebar -->
<div class="w3-sidebar w3-black w3-bar-block" style="width:18%; ">
  <h1 class="w3-bar-item w3-cursive" style="background-color:black; color:white;">Menu</h1>
    <?php
    session_start();

    if(isset($_SESSION['Admin_name']) && isset($_SESSION['Admin_email']))
    {
        echo '<a href="adminhome.php" class="w3-bar-item w3-button">' . $_SESSION['Admin_name'].'</a>';
    }
    else
    {
        header("location:home.php");
    }

?>
  <a href="Sign_up.php" class="w3-bar-item w3-button">Add Employee</a>
  <a href="Admindetails.php" class="w3-bar-item w3-button">Employee List</a>
  <a href="add_vehicles.php" class="w3-bar-item w3-button">Vehicles</a>
  <a href="insert_cost.php" class="w3-bar-item w3-button">Insert Cost</a>
  <a href="show_cost.php" class="w3-bar-item w3-button">Show Cost</a>
  <a href="schedule.php" class="w3-bar-item w3-white w3-button">Schedules</a>
  <a href="profit.php" class="w3-bar-item w3-button">Profit</a>


  <?php
  echo '<a href="Backend/logout.php?logout" class="w3-bar-item w3-button">Logout</a>';
  ?>
  
</div>   
    
<div style="margin-left:18%">

    <div class="w3-container w3-black ">
    <h1 align="center" class="w3-cursive">Car Rent Management</h1>
    </div>
    <center>
    <button class="button" onclick="panding_request()">Panding Request</button>
    <button class="button" onclick="upcoming_schedule()">Upcoming Schedules</button>
</center>
<div id="panding">
<center>
<table id="customers" style="color:black;">
    <tr>
        <th>Serial No</th>
        <th>User Id</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Cars</th>
        <th>Micro</th>
        <th>Ambulance</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Type</th>
        <th>Notes</th>
        <th>Price</th>
        
    </tr>
    <?php
    include_once '../DB.php';
    $query = "SELECT booking.id AS `serial`, booking.user_id, users.name, users.phone, booking.cars, booking.micro, booking.ambulance, booking.j_from, booking.j_to, booking.j_date, booking.note, booking.type, booking.price FROM `booking` INNER JOIN `users` ON booking.user_id=users.id WHERE `panding` = 1;";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td align="right"><?php echo $row['serial']; ?></td>
            <td align="right"><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td align="right"><?php echo $row['cars']; ?></td>
            <td align="right"><?php echo $row['micro']; ?></td>
            <td align="right"><?php echo $row['ambulance'] ?></td>
            <td><?php echo $row['j_from']; ?></td>
            <td><?php echo $row['j_to']; ?></td>
            <td><?php echo $row['j_date']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['note']; ?></td>
            <td><?php 
            if($row['price']==NULL)
            {
                echo '<form action="schedule.php" method="post"><input type="number" min="0" name="price" placeholder="Add Price"><input type="hidden" name="id" value='.$row['serial'].'></form>';
            }
            else
            {
                echo $row['price'];
            }
            ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</center>
</div>
<div id="upcoming">
<center>
<table id="customers" style="color:black;">
    <tr>
        <th>Serial No</th>
        <th>User Id</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Cars</th>
        <th>Micro</th>
        <th>Ambulance</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Type</th>
        <th>Notes</th>
        <th>Price</th>
        <th>Status</th>
        
    </tr>
    <?php
    include_once '../DB.php';
    $query = "SELECT booking.id AS `serial`, booking.user_id, users.name, users.phone, booking.cars, booking.micro, booking.ambulance, booking.j_from, booking.j_to, booking.j_date, booking.note, booking.type, booking.price, booking.j_status FROM `booking` INNER JOIN `users` ON booking.user_id=users.id WHERE `panding` = 0 ORDER BY booking.j_date ASC;";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td align="right"><?php echo $row['serial']; ?></td>
            <td align="right"><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td align="right"><?php echo $row['cars']; ?></td>
            <td align="right"><?php echo $row['micro']; ?></td>
            <td align="right"><?php echo $row['ambulance'] ?></td>
            <td><?php echo $row['j_from']; ?></td>
            <td><?php echo $row['j_to']; ?></td>
            <td><?php echo $row['j_date']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['note']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <?php
                if($row['j_status']==NULL)
                {
                    echo '<form action="schedule.php" method="post"><input type="text" name="status"><input type="hidden" name="id" value='.$row['serial'].'></form>';
                }
                else
                {
                    echo 'Done';
                }
                ?>
                </td>
        </tr>
        <?php
    }
    ?>
</table>
</center>
</div>
    


</div>

    </body>
</html>