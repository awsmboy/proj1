<?php  
 
include("dbcon.php");  
$delete_id=$_GET['del'];  
$delete_query="delete from item WHERE iid='$delete_id'";//delete query  
$run=mysqli_query($con,$delete_query);  
if($run)  
{  
//javascript function to open in the same window   
    echo "<script>window.open('viewitem.php?deleted=Item has been deleted','_self')</script>";  
}  
  
?>