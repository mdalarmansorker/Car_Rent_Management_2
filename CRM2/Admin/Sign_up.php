<!DOCTYPE html>
<html>
<head>
  <title>Add New Employee</title>
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
  <a href="Sign_up.php" class="w3-bar-item w3-white w3-button">Add Employee</a>
  <a href="Admindetails.php" class="w3-bar-item w3-button">Employee List</a>
  <a href="add_vehicles.php" class="w3-bar-item w3-button">Vehicles</a>
  <a href="insert_cost.php" class="w3-bar-item w3-button">Insert Cost</a>
  <a href="show_cost.php" class="w3-bar-item w3-button">Show Cost</a>
  <a href="schedule.php" class="w3-bar-item w3-button">Schedules</a>
  <a href="profit.php" class="w3-bar-item w3-button">Profit</a>
  <?php
  echo '<a href="Backend/logout.php?logout" class="w3-bar-item w3-button">Logout</a>';
  ?>
  
</div>   


<div style="margin-left:18%">

<div class="w3-container w3-black">
  <h1 align="center" class="w3-cursive">Car Rent Management</h1>
</div>
<?php
  include_once '../DB.php';
  $email = $_SESSION['Admin_email'];
  $sql = "SELECT `Designation` FROM `admin` WHERE `Email`='$email'";
  $position = mysqli_query($con, $sql);
  if($result = mysqli_fetch_assoc($position))
  {
      if($result['Designation']!='CEO' and $result['Designation']!='MD' and $result['Designation']!='Manager' and $result['Designation']!='Admin' )
      {
        echo '<h3 align="center" style="color:white;" class="w3-cursive">You Can not Add Any Employee</h3>';
        exit();
      }
  }
?>
<center>
<div class="container container1">
  <form action="Backend/Signupdata.php" method="post">
    <!-- to print a message receive from backend page -->
  <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>
  <div class="row">
    <div class="col-25">
      <label>Name</label>
    </div>
    <div class="col-75">
      <input type="text" name="Name" required placeholder="Your name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Email</label>
    </div>
    <div class="col-75">
      <input type="email" name="Email" required placeholder="example@mail.com">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Password</label>
    </div>
    <div class="col-75">
      <input type="password" required name="password" placeholder="Password">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Phone</label>
    </div>
    <div class="col-75">
      <input type="tel" required pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" name="phone" placeholder="0173456789">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Gender</label>
    </div>
    <div class="col-75">
      <select name="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Designation</label>
    </div>
    <div class="col-75">
      <select name="Designation">
            <option value="Null">Post</option>
            <option value="CEO">CEO</option>
            <option value="MD">MD</option>
            <option value="Manager">Manager</option>
            <option value="Admin">Admin</option>
            <option value="Member">Member</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>Division</label>
    </div>
    <div class="col-75">
      <select name="Division">
            <option value="Dhaka">Dhaka</option>
                <option value="Chittagang">Chittagang</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Khulna">Khulna</option>
                <option value="Barishal">Barishal</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Rangpur" selected>Rangpur</option>
                <option value="Mymanshing">Mymanshing</option>
      </select>
    </div>
  </div>
  
  <br>
  <div class="row">
    
  <input type="submit" value="Sign Up" align="center" style="color: black;font-weight:bold;font-size:20px;font-family:Time New Roman;">
    </div>
  
  </div>
  </form>
</div>
  </center>
  </div>
</body>
</html>

