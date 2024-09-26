<?php 
include('../includes/connection.php');

if (isset($_POST['adminRegistration'])) {
    // Sanitize inputs to prevent SQL injection
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
    
    // Check if mobile number already exists
    $check_mobile_query = "SELECT * FROM admins WHERE mobile='$mobile'";
    $check_mobile_result = mysqli_query($connection, $check_mobile_query);

    if (mysqli_num_rows($check_mobile_result) > 0) {
        // Mobile number already exists
        echo "<script type='text/javascript'>
        alert('This mobile number is already registered. Please use a different number.');
        window.location.href = 'admin_register.php';
        </script>";
    } else {
        // Check if email already exists
        $check_email_query = "SELECT * FROM admins WHERE email='$email'";
        $check_email_result = mysqli_query($connection, $check_email_query);

        if (mysqli_num_rows($check_email_result) > 0) {
            // Email already exists
            echo "<script type='text/javascript'>
            alert('This email address is already registered. Please use a different email.');
            window.location.href = 'admin_register.php';
            </script>";
        } else {
            // Proceed with registration
            $query = "INSERT INTO admins (name, email, password, mobile) VALUES ('$name', '$email', '$password', '$mobile')";
            $query_run = mysqli_query($connection, $query);
            
            if ($query_run) {
                echo "<script type='text/javascript'>
                alert('Admin registered successfully...');
                window.location.href = '../index.php';
                </script>";
            } else {
                // Handle any errors from the query
                echo "<script type='text/javascript'>
                alert('Error... please try again');
                window.location.href = 'admin_register.php';
                </script>";
            }
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Task Manager|user registration</title>
</head>
<body>
        <div class="row">
            <div class="mt-5 pt-5">
                <div class="col-md-3 m-auto shadow" id="register-home-page">
                    <center><h3 class="py-3">Admin Registration</h3></center>
                    <form action="" method="post">
                        <div class="form-group my-3 text-center">
                            <input type="text" name="name" class="form-control"placeholder="Enter Name" required>
                        </div>
                        <div class="form-group my-3 text-center">
                            <input type="email" name="email" class="form-control"placeholder="Enter Email" required>
                        </div>
                        <div class="form-group my-3 text-center">
                            <input type="text" name="mobile" class="form-control"placeholder="Enter Mobile No." required>
                        </div>
                        <div class="form-group my-3 text-center">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group text-center my-3">
                            <input type="submit" name="adminRegistration" class="btn border-0 rounded-lg custom-btn log" id="" value="Register">
                        </div>
                    </form>
                    <center><button class="btn border-0 rounded-lg custom-btn" onclick="location.href='../index.php'" >Go To Home🏠</button></center>
                </div>
            </div>
        </div>
</body>
</html>