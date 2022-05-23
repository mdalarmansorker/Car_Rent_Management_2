<?php
// Process delete operation after confirmation
if(isset($_POST["id"])/* && !empty($_POST["id"])*/){
    // Include config file
    include_once '../../DB.php';    
    // Prepare a delete statement
    $sql = "DELETE FROM cost WHERE id = ?";
    //prepare for exicution if not efficient
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters 
        // for take place on question mark 
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters 
        //cut the special characters from the id string
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: insert_cost.php?delete=$param_id");
            exit();
        } else{
            //if data not delete
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($con);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // if there is no id parameter.
        echo "Something error! try again.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body style="background-image: url('13652.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <!-- convert to html special characters to entity to secure it for not to attack it hacker -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this cost record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="insert_cost.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>