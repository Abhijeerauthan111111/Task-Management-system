<?php 
    session_start();
    include('../includes/connection.php');
    if(isset($_POST['create_task'])){
        $query = "INSERT into tasks values(null,$_POST[id],'$_POST[description]',
            '$_POST[start_date]','$_POST[end_date]','Not Started')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task created successfully...');
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
    <title>Task Manager|admin dasboard</title>
    <!-- jQuery code -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create-task").click(function(){
                $("#right-sidebar").load("create_task.php");
            });
        });
        $(document).ready(function(){
            $("#manage-task").click(function(){
                $("#right-sidebar").load("manage_task.php");
            });
        });
    </script>
</head>
<body>
  <div class="row" id="header">
        <div class="col-md-6">
            <h3>Task Manager</h3>
        </div>
        <div class="col-md-6 mt-2 text-center">
            <span  class="mx-4"><b>Email:</b><?php echo $_SESSION['email'] ?></span>
            <span class="mx-4"><b>Name:</b> <?php echo $_SESSION['name'] ?></span>
            <!-- <a href="admin_register.php">Register New Admin</a> -->
            <button class="regadmin" onclick="location.href='admin_register.php'" >Register New Admin</button>
        </div>
  </div>
  
  <div class="row">
    <div class="col-md-2" id="left-sidebar">     
        <div class="text-center my-3" id="sidebar-header"> 
            <h5>Menu</h5>
        </div>
        <table class="table">
            <tr>
                <td class="text-center" style="border-bottom:none;">
                    <a href="admin_dashboard.php" type="button">Dashboard</a>
                </td>
            </tr>
            <tr>
                <td class="text-center" style="border-bottom:none;">
                    <a id="manage-task" type="button">Manage Tasks</a>
                </td>
            </tr>
            <tr>
                <td class="text-center" style="border-bottom:none;">
                    <a id="create-task" type="button">Create Tasks</a>
                </td>
            </tr>
            <tr>
                <td class="text-center" style="border-bottom:none;">
                    <a href="../logout.php" type="button">Logout</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-10 " id="right-sidebar">         
    <h3 class="m-1" style="color:#3d52a0;">All Tasks</h4>
            <table class="m-2" style="line-height:3em;font-size:1.2em; width:50vw;">
            <tr style="color:black;">
                <th>S.No</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            <?php 
            $sno=1;
            $query = "SELECT * from tasks";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr style="color:black;">
                    <td><?php echo $sno;?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['status'];?></span></td>
                </tr>
                <?php
                $sno+=1;
            }
        ?>
            </table>
    </div>
  </div>

</body>
</html>