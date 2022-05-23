<?php
    include_once '../../DB.php';
    session_start();
    $user_id = $_SESSION['User_id'];
    $cars = $_POST['Cars'];
    $micro = $_POST['Micro'];
    $ambulance = $_POST['Ambulance'];
    $from = $_POST['start_point'];
    $to = $_POST['end_point'];
    $type = $_POST['type'];
    $order_date = $_POST['order_date'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO `booking` (`user_id`, `cars`, `micro`, `ambulance`, `j_from`, `j_to`, `j_date`,`note`, `type`,`panding`) VALUES($user_id, $cars, $micro, $ambulance, '$from', '$to', '$order_date', '$comment', '$type', 1);";
    $run = mysqli_query($con, $query);
    if($run)
    {
        header("location: ../booking.php?error=Booking Successful - Please wait for the confirmation");
    }
    else
    {
        header("location: ../booking.php?error=Booking Failed - Please try again after sometime or call on the number");
    }
?>