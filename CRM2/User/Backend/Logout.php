<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        // session_destroy();
        header("location:../home.php");
        unset($_SESSION['User_name']);
        unset($_SESSION['User_email']);
    }

?>