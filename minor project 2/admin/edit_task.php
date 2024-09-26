<?php 
   include('../includes/connection.php');
   if(isset($_POST['edit_task'])){
    $query = "UPDATE tasks set uid = $_POST[id],description = '$_POST[description]',
    start_date = '$_POST[start_date]', end_date = '$_POST[end_date]' WHERE tid = $_GET[id]";
     $query_run = mysqli_query($connection,$query);
     if($query_run){
         echo "<script type='text/javascript'>
         alert('Task updated successfully...');
         window.location.href = 'admin_dashboard.php';
         </script>
         ";
     }
     else{
         echo "<script type='text/javascript'>
         alert('Please Try Again');
         window.location.href = 'admin_dashboard.php';
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Task Manager|edit task</title>
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-6">
            <h3>Task Manager</h3>
        </div>
        <div class="col-md-6 mt-2 text-center">
            <b>Email:</b> admin@gmail.com
            <span class="mx-4"><b>Name:</b> Admin name</span>
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
           <div class="form-group">
                    <label class="my-2" for="">Select user:</label>
                    <select name="id" id="" class="form-control my-2" required>
                        <option value="">-Select</option>
                        <?php 
                          $query1 = "SELECT uid,name from users";
                          $query_run1 = mysqli_query($connection,$query1);
                          if(mysqli_num_rows($query_run)){
                             while($row1 = mysqli_fetch_assoc($query_run1)){
                                ?>
                                <option value="<?php echo $row1['uid'];?>"><?php echo $row1['name']; ?></option>
                                <?php
                             }
                          }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class="my-2" for="">Description:</label>
                    <textarea name="description" class="form-control" id="" cols="50"
                     rows="3" required><?php echo $row['description']?></textarea>
                </div>
                <div class="form-group mb-4">
                    <label class="my-2" for="">Start date:</label>
                    <input type="date" class="form-control" name="start_date"
                    value="<?php echo $row['start_date']?>" required>
                </div>
                <div class="form-group mb-4">
                    <label class="my-2" for="">End date:</label>
                    <input type="date" class="form-control" name="end_date"
                    value="<?php echo $row['end_date']?>" required>
                </div>
                <input type="submit" class="btn  border-0 rounded-lg mb-2 custom-btn" id="" name="edit_task"
                value="Update">
           </form>
           <?php
        }
             ?>
        </div>

    </div>

</body>
</html>