<?php 
   include('../includes/connection.php');
   $query = "DELETE from tasks where tid = $_GET[id]";
   $query_run = mysqli_query($connection,$query);
     if($query_run){
         echo "<script type='text/javascript'>
         alert('Task deleted successfully...');
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
?>