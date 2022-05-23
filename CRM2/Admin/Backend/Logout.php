<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        // session_destroy();
        header("location:../home.php");
        unset($_SESSION['Admin_name']);
        unset($_SESSION['Admin_email']);
    }

?>