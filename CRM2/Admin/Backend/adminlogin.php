<?php

    include_once '../../DB.php';

    session_start();
    $Email = $_POST['email'];
	$Password = $_POST['password']; 
            $query="SELECT * FROM `admin` WHERE `Email`='$Email' AND `Password`='$Password';";;
            $result=mysqli_query($con,$query);
// Fetch a result row as an associative array:
            if($data = mysqli_fetch_assoc($result))
            {
                $_SESSION['Admin_name']= $data['Name'];
                $_SESSION['Admin_email'] = $data['Email'];
                
                header("location:../adminhome.php");
            }
            else
            {
                header("location:../home.php?Error=Please Enter Correct Email and Password ");
            }
        
 
?>