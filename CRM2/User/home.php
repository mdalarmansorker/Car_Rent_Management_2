<?php
session_start();
if(isset($_SESSION['User_name']) && isset($_SESSION['User_email']))
{
  header("location:rentacar.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rent A Car</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../CSS/userstyle.css">
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background-image: url('../Image/car1.jpg'); background-size: cover; background-repeat: no-repeat;">

	<div class="main">  
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="login">
				<form action="./Backend/userlogin.php" method="post">
					<label for="chk" aria-hidden="true"><center>Car Rent<br>User Login</center></label>
					<?php if (isset($_GET['error'])) { ?>
						<span style="margin-bottom:10px;">
	<p class="error" style="color:white;text-align:center;"><?php echo $_GET['error']; ?></p>
	</span>
  <?php } ?>
					
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
			<div class="signup">
			<form action="./Backend/userregistration.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<?php if (isset($_GET['error'])) { ?>
						<span style="margin-bottom:10px;">
	<p class="error" style="color:white;text-align:center;"><?php echo $_GET['error']; ?></p>
	</span>
  <?php } ?>
					<input type="text" name="name" placeholder="Name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="phone" name="phone" placeholder="Phone Number" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>
	</div>

</body>
</html>
