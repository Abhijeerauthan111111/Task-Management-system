<?php 
   session_start();
   include('includes/connection.php');
   if(isset($_POST['update'])){
    $query = "UPDATE tasks set status = '$_POST[status]' WHERE tid = $_GET[id]";
     $query_run = mysqli_query($connection,$query);
     if($query_run){
         echo "<script type='text/javascript'>
         alert('Task updated successfully...');
         window.location.href = 'user_dashboard.php';
         </script>
         ";
     }
     else{
         echo "<script type='text/javascript'>
         alert('Please Try Again');
         window.location.href = 'user_dashboard.php';
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
    <title>Task Manager|update task</title>
</head>
<body>
<div class="row" id="header">
        <div class="col-md-6">
            <h3>Task Manager</h3>
        </div>
        <div class="col-md-6 mt-2 text-center">
            <span class="mx-4"><b>Email :</b>  <?php echo $_SESSION['email']; ?></span>
            <span class="mx-4"><b>Name :</b> <?php echo $_SESSION['name']; ?> </span>
        </div>
  </div>
    <div class="row">
        <div class="col-md-4 auto mx-5"><br>
           <h3 style="color:#3d52a0;">Edit the task</h3><br>
           <?php 
             $query = "SELECT * from tasks where tid = $_GET[id]";
             $query_run = mysqli_query($connection,$query);
             while($row = mysqli_fetch_assoc($query_run)){

                ?>
           <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name=""id class="form-control" 
                value="" required>
            </div>
           <div class="form-group mb-3">
                   <select name="status" class="form-control" id="">
                     <option value="">-Select</option>
                     <option value="In-Progress">In-Progress</option>
                     <option value="Completed">Completed</option>
                   </select>
                </div>  
                <input type="submit" class="btn border-0 rounded-lg mb-2 custom-btn" id="" name="update"
                value="Update">
           </form>
           <?php
        }
             ?>
        </div>

    </div>

</body>
</html>