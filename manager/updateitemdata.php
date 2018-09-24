<?php
 
 session_start();
 if(!isset($_SESSION['username'])){
    header('location:login.php');
 }
 ?>

<?php  
 
include("dbcon.php");

    $update_id=$_GET['id'];  
    $sql="SELECT * FROM `item` WHERE `iid`='$update_id'";//delete query  
    $run=mysqli_query($con,$sql);  

    $data=mysqli_fetch_assoc($run);
?>

<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-4.1.3-dist\css\bootstrap.css">  
    <title>Insertion</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
</style>  
<body>  
  
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Insert Item details</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="updateitemdata2.php" enctype="multipart/form-data">  
                        <fieldset>  
                            <div class="form-group">  
                               Enter Item desc/name: <input class="form-control" name="name" type="text" value=<?php echo $data['idesc']; ?> pattern="[A-Za-z ]{1-32}" title="Only Letters and spaces allowed" required autofocus>
                            </div>  
                            <div class="form-group">  
                               Enter Item price: <input class="form-control" name="price" type="text" value=<?php echo $data['price']; ?> pattern="\d+(\.\d+)?" required>  
                            </div> 
                            <div class="form-group">  
                               Upload image: <input class="form-control" name="img" type="file" required>  
                            </div>   
                            <input name="id" type="hidden" value=<?php echo $data['iid']; ?> >
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="submit" name="submit" >  
  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
  
</html>  
