<!DOCTYPE html>
<html>
    <head><title>Rent A Car - User_info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSS/style.css">
    
    <style>
    
    </style>
        </head>
    <body class="car2">
    <!-- Sidebar -->
<div class="w3-sidebar w3-black w3-bar-block" style="width:18%; ">
  <h1 class="w3-bar-item w3-cursive" style="background-color:black; color:white;">Menu</h1>
    <?php
    session_start();

    if(isset($_SESSION['User_name']) && isset($_SESSION['User_email']))
    {
        echo '<a href="rentacar.php" class="w3-bar-item w3-white w3-button">' . $_SESSION['User_name'].'</a>';
    }
    else
    {
        header("location:home.php");
    }

?>
  <a href="rides.php" class="w3-bar-item w3-button">Rides</a>
  <a href="booking.php" class="w3-bar-item w3-button">Book A Ride</a>
  <?php
  echo '<a href="Backend/logout.php?logout" class="w3-bar-item w3-button">Logout</a>';
  ?>
  
</div>   
    
<div style="margin-left:18%">

    <div class="w3-container w3-black ">
    <h1 align="center" class="w3-cursive">Rent A Car</h1>
    </div>
    <center>
    <div align="left" class="container_profile container1">
    <?php
// database connection code
include_once '../DB.php';
$email = $_SESSION['User_email'];
$sql = "SELECT * FROM `users` WHERE `email`='$email'";
$rs = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($rs);
    echo '<h3 class="w3-cursive" style="color: white;">Name: '.$data['name'].'</h3>';
    echo '<h3 class="w3-cursive" style="color: white;">Email: '.$data['email'].'</h3>';
    echo '<h3 class="w3-cursive" style="color: white;">Phone: '.$data['phone'].' '.'<button style="background-color: Transparent;color:white; border:none;" title="Change Number"><i class="fas fa-edit"></i></button>'.'</h3>';
   
mysqli_close($con);
?> 
    </div>
</center>
</div>

    </body>
</html>