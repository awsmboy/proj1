<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-4.1.3-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->  
    <title>View Items</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 20px;  
  
    }  
  
</style>  
  
<body>  
<div align="center">  
<h3 class="panel-title">Update Item details</h3> <br> 
    <div class="panel-body">  
        <form role="form" method="post" action="updateitem.php">  
            <div class="form-group">  
                Enter item name: <input  placeholder="Enter name" name="name" type="text" required autofocus> &nbsp
                <input class="btn btn-primary" type="submit" name="submit" value="Search"> 
            </div> 
    </form>
    </div>
  </div>   
<div class="table-scrol">  
    <h3 align="center">All the Items</h3>  
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
            <thead>  
            <tr> 
                <th>Item Id</th>  
                <th>Item Name</th>  
                <th>Item Price</th>
                <th>Image</th> 
                <th>Update Item</th>  
            </tr>  
            </thead>  

<?php
    if(isset($_POST['submit']))
    {
        include("dbcon.php");
        
        $name=$_POST['name'];

        $sql="SELECT * FROM `item` WHERE `idesc` LIKE '%$name%'";
        $run=mysqli_query($con,$sql);

        if(mysqli_num_rows($run)<1)
        {
            echo "NO record found";
        }
        else
        {
            $count=0;
            while($data=mysqli_fetch_assoc($run))
            {
                $count++;
            ?>     
            <tr>  
                <td><?php echo $count; ?></td>  
                <td><?php echo $data['idesc'];  ?></td>  
                <td><?php echo $data['price'];  ?></td>  
                <td><img src="images/<?php echo $data['img']; ?>"  style="max-width:100px;"></td>
                <td><a href="updateitemdata.php?id=<?php echo $data['iid'];?>"><button class="btn btn-danger">Update</button></a></td>  
           </tr>
           <?php
            }
             
  
        }

    }
?>
    </table>
    </div>
</div>
</body>
</html>

