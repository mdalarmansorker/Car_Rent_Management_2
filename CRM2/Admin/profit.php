<!DOCTYPE html>
<html>
    <head><title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>
function onButtonClick(){
  document.getElementById('numberinput').className="show";
}
    </script>
    <style>
    .hide{
    display:none;
    }
    .show{
    display:block;
    }
    </style>
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
  <a href="schedule.php" class="w3-bar-item w3-button">Schedules</a>
  <a href="profit.php" class="w3-bar-item w3-white w3-button">Profit</a>


  <?php
  echo '<a href="Backend/logout.php?logout" class="w3-bar-item w3-button">Logout</a>';
  ?>
  
</div>   
    
<div style="margin-left:18%">

    <div class="w3-container w3-black ">
    <h1 align="center" class="w3-cursive">Car Rent Management</h1>
    </div>
    
</div>

    </body>
</html>