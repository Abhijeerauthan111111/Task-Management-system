<html>
<body>
    <h3 class="mt-2" style="color:#3d52a0;">Create a new task </h3>
    <div class="row">
        <div class="col-md-6" style="color:black">
            <form action="" method="post">
                <div class="form-group mb-4">
                    <label class="my-2" for="">Select user:</label>
                    <select name="id" id="" class="form-control">
                        <option value="">-Select</option>
                        <?php 
                          include('../includes/connection.php');
                          $query = "SELECT uid,name from users";
                          $query_run = mysqli_query($connection,$query);
                          if(mysqli_num_rows($query_run)){
                             while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <option value="<?php echo $row['uid'];?>"><?php echo $row['name']; ?></option>
                                <?php
                             }
                          }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class="my-2" for="">Description:</label>
                    <textarea name="description" class="form-control" id="" cols="50"
                     rows="3" placeholder="Mention the new task"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label class="my-2" for="">Start date:</label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="form-group mb-4">
                    <label class="my-2" for="">End date:</label>
                    <input type="date" class="form-control" name="end_date">
                </div>
                <input type="submit" class="btn border-0 rounded-lg mb-2 custom-btn" id="" name="create_task"
                value="Create">
            </form>
        </div>
    </div>
</body>
</html>