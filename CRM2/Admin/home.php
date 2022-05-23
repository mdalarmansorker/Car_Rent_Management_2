<?php
session_start();
if(isset($_SESSION['Admin_name']) && isset($_SESSION['Admin_email']))
{
  header("location:adminhome.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Rent Management - Admin</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/adminlogin.css">

    <!--Stylesheet-->
    <style media="screen">
      
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="Backend/adminlogin.php" method="post">
        <h2 style="font-family: 'Times New Roman', Times, serif,bold;">Car Rent</h2>
        <h3 style="font-family: 'Times New Roman', Times, serif;">Admin Login</h3>
        <?php if (isset($_GET['Error'])) { ?>
		<span style="margin-bottom:10px;">
	<p class="Error" style="color:white;text-align:center;"><?php echo $_GET['Error']; ?></p>
	</span>
  <?php } ?>
        <label for="username">Email</label>
        <input type="email" name="email" required placeholder="Email" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" required placeholder="Password" id="password">

        <button>Log In</button>
    </form>
</body>
</html>
