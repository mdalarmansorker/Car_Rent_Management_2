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
        echo '<a href="rentacar.php" class="w3-bar-item w3-button">' . $_SESSION['User_name'].'</a>';
    }
    else
    {
        header("location:home.php");
    }

?>
  <a href="rides.php" class="w3-bar-item w3-button">Rides</a>
  <a href="booking.php" class="w3-bar-item  w3-white w3-button">Book A Ride</a>
  <?php
  echo '<a href="Backend/logout.php?logout" class="w3-bar-item w3-button">Logout</a>';
  ?>
  
</div>   
    
<div style="margin-left:18%">

    <div class="w3-container w3-black ">
        <h1 align="center" class="w3-cursive">Rent A Car</h1>
    </div>
    <header class="header">
        <h3>Welcome to Our Car Rent Site.</h3>
        <p>Fill This Form to Order Vehicles From our Company</p>
        <p>You will get a phone to confirm the order. Or You can contact us:</p>
        <p>Contact Number: +8801700000011111</p>
        
    </header>
<center>
<div class="container_user container1">
  <form action="Backend/back_booking.php" method="post">
    <!-- to print a message receive from backend page -->
  <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>
  <div class="row">
    <div class="col-25">
      <label>Select Vehicles</label>
    </div>
    <div class="col-75">
    <select name="Cars">
            <option value="car">Car</option>
            <option value="micro">Micro</option>
            <option value="ambulance">Ambulance</option>
            
    </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Journey From</label>
    </div>
    <div class="col-75">
    <select name="start_point">
                    <option selected>Rangpur</option>
                    <option>Panchagarh</option>
                    <option>Dinajpur</option>
                    <option>Thakurgaon</option>
                    <option>Nilphamary</option>
                    <option>Kurigram</option>
                    <option>Gaibandha</option>
                    <option>Bogura</option>
                    <option>Khulna</option>
                    <option>Dhaka</option>
                    <option>Rajshahi</option>
                    <option>Mymanshing</option>
                    <option>Sylhet</option>
                    <option>Barishal</option>
                </select>   
      </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Journey To</label>
    </div>
    <div class="col-75">
    <select name="end_point">
                    <option>Rangpur</option>
                    <option selected>Dhaka</option>
                    <option>Nilphamary</option>
                    <option>Chittagang</option>
                    <option>Dinajpur</option>
                    <option>Rajshahi</option>
                    <option>Mymanshing</option>
                    <option>Sylhet</option>
                    <option>Barishal</option>
                </select>    
      </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Type</label>
    </div>
    <div class="col-75">
    <select name="type" class="clr ">
                    <option>AC</option>
                    <option selected>Non AC</option>
                </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Order Date</label>
    </div>
    <div class="col-75">
    <input type="date" id="order_date" name="order_date">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Give your comments</label>
    </div>
    <div class="col-75">
    <textarea name="comment" cols="70" rows="4"></textarea>
    </div>
  </div>
  <div class="row">
  <input type="submit" value="Submit" align="center" style="color: black;font-weight:bold;font-size:20px;font-family:Time New Roman;">
    </div>
  
  </div>
  

  </form>
</div>
  </center>
</div>
</body>
</html>