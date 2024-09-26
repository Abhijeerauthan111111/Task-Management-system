<?php  
    include('includes/connection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Task Manager| tasks</title>
</head>
<body>
    <center><h3 style="color:#3d52a0;" class="mt-4">Your Tasks</h3></center><br>
    <table class="table" style="width:75vw; margin-left:50px;">
        <tr>
            <th>S.No</th>
            <th>Task ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th> 
        </tr>
        <?php 
            $sno=1;
            $query = "SELECT * from tasks where uid= $_SESSION[uid]";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $row['tid']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['start_date']; ?></td>
                    <td><?php echo $row['end_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td> 
                        <!-- <a  href="update_status.php?id=<?php echo $row['tid']?>
                    "  >Update</a> -->
                    <button class="btn border-0 rounded-lg custom-btn" onclick="location.href='update_status.php?id=<?php echo $row['tid']?>'">Update</button>
                  </td>
                </tr>
                <?php
                $sno+=1;
            }
        ?>
    </table>
</body>