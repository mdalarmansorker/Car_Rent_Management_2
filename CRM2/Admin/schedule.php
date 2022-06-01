<?php
    if (isset($_POST['price']) AND isset($_POST['vehicle_id'])){
    include_once '../DB.php';
    $vehicle_id = $_POST['vehicle_id'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $panding = 0;
    $update = "UPDATE `booking` SET `price` = '$price', `vehicle_id`='$vehicle_id', `panding` = $panding WHERE `id`=$id;";
    $rs = mysqli_query($con, $update);
    // $up = "UPDATE `booking` SET `panding` = $panding WHERE `id`=$id;";
    // $rs1 = mysqli_query($con, $up);

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
    <head>
    <title>Admin - Schedule</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSS/schedule.css">
    <script type="text/javascript" src="../JavaScript/functions.js">
        function add_price() {
    if (confirm('Are You Sure To Add?'))
    {
      return true;
    }
    else
    {
      event.stopPropagation(); 
      event.preventDefault();
    }
  }
  function cancel_order() {
    if (confirm('Are you sure to cancel this order?'))
    {
      return true;
    }
    else
    {
      event.stopPropagation(); 
      event.preventDefault();
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
  <!-- <a href="profit.php" class="w3-bar-item w3-button">Profit</a> -->


  <?php
  echo '<a href="Backend/logout.php?logout" class="w3-bar-item w3-button">Logout</a>';
  ?>
  
</div>   
    
<div style="margin-left:18%">

    <div class="w3-container w3-black ">
    <h1 align="center" class="w3-cursive">Car Rent Management</h1>
    </div>
    <center>
    <button class="button" onclick="panding_request()">Pending Request</button>
</center>
<div id="panding">
<center>
<table id="customers" style="color:black;">
    <tr>
        <th>Serial No</th>
        <th>User Id</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>V. Type</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Type</th>
        <th>Notes</th>
        <th>Select Vehicles</th>
        <th>Price</th>
        <th>Action</th>
        
    </tr>
    <?php
    include_once '../DB.php';
    $query = "SELECT booking.id AS `serial`, booking.user_id, users.name, users.phone, booking.vehicle, booking.j_from, booking.j_to, booking.j_date, booking.note, booking.type, booking.price, booking.vehicle_id FROM `booking` INNER JOIN `users` ON booking.user_id=users.id WHERE `panding` = 1 AND `cancel` = 0";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td align="right"><?php echo $row['serial']; ?></td>
            <td align="right"><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['vehicle']; ?></td>
            <td><?php echo $row['j_from']; ?></td>
            <td><?php echo $row['j_to']; ?></td>
            <td><?php echo $row['j_date']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['note']; ?></td>
            <?php 
            $type = $row['vehicle'];
            $sql = "SELECT * FROM `vehicles` WHERE `e_date` IS NULL AND `type`='$type';";
            $rs = mysqli_query($con,$sql);
            ?>
            <form action="schedule.php" method="post" onSubmit="return confirm('Do you want to submit?') ">
            <td>
            <select name="vehicle_id">
            <option>Select Vehicle</option>
            <?php
            while($data = mysqli_fetch_array($rs))
            {
                ?>
                <option value=<?php echo $data['id'];?>>
                    <?php 
                    echo $data['id'].' '.$data['model'];
                    ?>
                </option>
                <?php
            }
            ?>
            </select></td>
            <td><?php 
            if($row['price']==NULL)
            {
                $cid = $row['serial'];
                echo '<input type="number" required style="width:70px;" min="0" name="price" placeholder="Add Price">
                      <input type="hidden" name="id" value='.$row['serial'].'>
                      <input type="submit" value="Save" onclick="add_price()">';
            }
            else
            {
                echo $row['price'];
            }
            ?></td>
            </form>
            <td id="cancel"><?php
           if($row['price']==NULL)
          {
            $id = $row['serial'];
            echo '<a href="./Backend/c_order.php?id='. $id .'" title="Cancel Order"><button class="btn" onclick="cancel_order()"><i class="fa fa-close">Cancel</i></button></a>';
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

<center><button class="button" onclick="upcoming_schedule()">Upcoming Schedules</button></center>

<div id="upcoming">
<center>
<table id="customers" style="color:black;">
    <tr>
        <th>Serial No</th>
        <th>User Id</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Type</th>
        <th>Vehicle</th>
        <th>Price</th>
        <th>Status</th>
        
    </tr>
    <?php
    include_once '../DB.php';
    $query = "SELECT booking.id AS `serial`, booking.user_id, users.name, users.phone, booking.j_from, booking.j_to, booking.j_date, booking.note, booking.type, booking.price, booking.j_status,vehicles.id AS v_id, vehicles.model FROM `booking` JOIN `users` ON booking.user_id=users.id JOIN `vehicles` ON booking.vehicle_id=vehicles.id WHERE `panding` = 0 ORDER BY booking.j_date ASC;";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td align="right"><?php echo $row['serial']; ?></td>
            <td align="right"><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['j_from']; ?></td>
            <td><?php echo $row['j_to']; ?></td>
            <td><?php echo $row['j_date']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['v_id'].'-'.$row['model']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <?php
                if($row['j_status']==NULL)
                {
                    echo '<form class="ignore-css" action="schedule.php" method="post"><input type="text" style="width:50px;" name="status"><input type="hidden" name="id" value='.$row['serial'].'></form>';
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