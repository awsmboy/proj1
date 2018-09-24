<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-4.1.3-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->  
    <title>View Users</title>  
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
<h3 class="panel-title">Update Employee details</h3> <br> 
    <div class="panel-body">  
        <form role="form" method="post" action="update.php">  
            <div class="form-group">  
                Enter employee mail: <input  placeholder="Enter mail" name="mail" type="mail" required autofocus> &nbsp 
                Enter employee name: <input  placeholder="Enter name" name="name" type="text" required> &nbsp
                <input class="btn btn-primary" type="submit" name="submit" value="Search"> 
            </div> 
    </form>
    </div>
  </div>   
<div class="table-scrol">  
    <h3 align="center">All the Employee</h3>  
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
            <thead>  
            <tr> 
                <th>User Id</th>  
                <th>User Name</th>  
                <th>User E-mail</th>
                <th>User Phone</th>  
                <th>User Pass</th>  
                <th>Update User</th>  
            </tr>  
            </thead>  

<?php
    if(isset($_POST['submit']))
    {
        include("dbcon.php");
        
        $email=$_POST['mail'];
        $name=$_POST['name'];

        $sql="SELECT * FROM `employee` WHERE mail='$email' AND `name` LIKE '%$name%'";
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
                <td><?php echo $count;  ?></td>  
                <td><?php echo $data['name'];  ?></td>  
                <td><?php echo $data['mail'];  ?></td>  
                <td><?php echo $data['phone'];  ?></td>
                <td><?php echo $data['password'];  ?></td>
                <td><a href="updateemp.php?eid=<?php echo $data['eid'];?>"><button class="btn btn-danger">Update</button></a></td>  
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

