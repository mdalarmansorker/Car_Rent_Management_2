<?php

    include_once '../../DB.php';

    session_start();
    $Email = $_POST['email'];
	$Password = $_POST['pswd'];     
    $query = "SELECT * FROM `users` WHERE `email`='$Email' AND `password`='$Password';";
            $result=mysqli_query($con,$query);
// Fetch a result row as an associative array:
            if($data = mysqli_fetch_assoc($result))
            {
                $_SESSION['User_id']= $data['id'];
                $_SESSION['User_name']= $data['name'];
                $_SESSION['User_email'] = $data['email'];
                header("location:../rentacar.php");
            }
            else
            {
                header("location:../home.php?error=Email/password incorrect!");
            }
        
 
?>