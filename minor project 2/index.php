<?php 
  session_start();
  include('includes/connection.php');
  if(isset($_POST['userLogin'])){
    $query = "SELECT email,password,name,uid FROM users WHERE email = '$_POST[email]'
              AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
        while($row = mysqli_fetch_assoc($query_run)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['uid'];
        }
        echo "<script type='text/javascript'>
        window.location.href = 'user_dashboard.php';
        </script>
        ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Please enter correct details');
        window.location.href = 'user_login.php';
        </script>
        ";
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Task Manager|user login</title>
</head>
<body>
        <div class="row">
            <div class="mt-5 pt-5">
                <div class="col-md-3 m-auto shadow" id="login-home-page">
                    <center><h3 class="py-3">User Login</h3></center>
                    <form action="" method="post">
                        <div class="form-group my-3 text-center">
                            <input type="email" name="email" class="form-control"placeholder="Enter Email" required>
                        </div>
                        <div class="form-group my-3 text-center">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group text-center my-3">
                            <input type="submit" name="userLogin" class="btn border-0 rounded-lg custom-btn mt-3 log "  value="Login" >
                        </div>
                    </form>
                    <div class="col d-flex justify-content-evenly mt-4">
                    
                        <button class="row-6 btn border-0 rounded-lg custom-btn" onclick="location.href='register.php'"  >User Registration</button>
                        <button class="row-6 btn border-0 rounded-lg custom-btn" onclick="location.href='admin/admin_login.php'"  >Login As Admin</button>
                    </div>

                </div>
            </div>
        </div>
</body>
</html>


