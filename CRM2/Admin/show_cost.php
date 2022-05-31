
<!DOCTYPE html>
<html>
<head>
  <title>Show Cost</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="../CSS/style.css">

</head>
<body class="car">
 <!-- Sidebar -->
 <div class="w3-sidebar w3-black w3-bar-block" style="width:18%; ">
  <h1 class="w3-bar-item w3-cursive" style="background-color:black; color:white;">Menu</h3>
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
  <a href="show_cost.php" class="w3-bar-item w3-white w3-button">Show Cost</a>
  <a href="schedule.php" class="w3-bar-item w3-button">Schedules</a>
  <!-- <a href="profit.php" class="w3-bar-item w3-button">Profit</a> -->
  <?php
  echo '<a href="Backend/logout.php?logout" class="w3-bar-item w3-button">Logout</a>';
  ?>
  
</div>   


<div style="margin-left:18%">

<div class="w3-container w3-black">
  <h1 align="center" class="w3-cursive">Car Rent Management</h1>
</div>

<center>
<div class="container container1">
  <form action="./Backend/show_cost_back.php" method="post">
  <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="row">
    <div class="col-25">
      <label>Car ID</label>
    </div>
    <div class="col-75">
      <select name="Car_ID">
        <option>Select The Vehicle</option>
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','crm2');
$sql = "SELECT * FROM `vehicles` WHERE `e_date` IS NULL;";
$rs = mysqli_query($con,$sql);
while($data = mysqli_fetch_array($rs))
{
    ?>
    <option value=<?php echo $data['id'];?> >
        <?php 
        echo $data['id'].' '.$data['model'];
        ?>
    </option>
    <?php
}
?>
</select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Starting Date</label>
    </div>
    <div class="col-75">
    <input type="date" required name="date1" placeholder="YYYY-MM-DD">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Ending Date</label>
    </div>
    <div class="col-75">
    <input type="date" required name="date2" placeholder="YYYY-MM-DD">
    </div>
  </div>
  
  
    <div class='row'>
        <input type="submit" value="Submit" align="center" style="color: black;font-weight:bold;font-size:20px;font-family:Time New Roman;">
    </div>
  
  </form>
</div></center>
  </div>
</body>
</html>

