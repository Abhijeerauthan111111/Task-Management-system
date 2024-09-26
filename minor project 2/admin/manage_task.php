<?php 
    include('../includes/connection.php');
?>
<html>
<body>
    <center><h3 class="mt-2" style="color:#3d52a0;">All assigned tasks</h3></center><br>
    <table class="table" id="admin-table">
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
            $query = "select * from tasks";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $row['tid'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['start_date'];?></td>
                    <td><?php echo $row['end_date'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <!-- <a href="edit_task.php?id=<?php echo $row['tid'];?>" class="edel">Edit</a>
                     | <a href="delete_task.php?id=<?php echo $row['tid'];?>" class="edel">Delete</a> -->
                       <button onclick="location.href='edit_task.php?id=<?php echo $row['tid'];?>'" id="edit">Edit</button>
                       <button onclick="location.href='delete_task.php?id=<?php echo $row['tid'];?>'" id="del" >🗑️</button>
                    </td>
                </tr>
                <?php
                $sno+=1;
            }
        ?>
    </table>
</body>
</html>