<?php
 
 session_start();
 if(!isset($_SESSION['username'])){
    header('location:login.php');
 }
?>

<?php  
 
include("dbcon.php");

    $update_id=$_GET['eid'];  
    $sql="SELECT * FROM `employee` WHERE `eid`='$update_id'";//delete query  
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
        margin-top: 100px;  
</style>  
<body>  
  
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Update Employee details</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="updatedata.php">  
                        <fieldset>  
                            <div class="form-group">  
                              Enter name: <input class="form-control" name="name" type="text" value=<?php echo $data['name']; ?> pattern="[A-Za-z ]{1-32}" title="Only Letters allowed" required autofocus>  
                            </div>  
                            <div class="form-group">  
                              Enter phone: <input class="form-control" name="phone" type="text" value=<?php echo $data['phone']; ?> pattern="[789][0-9]{9}" title="Enter valid Phone number" required>  
                            </div> 
                            <div class="form-group">  
                              Enter email: <input class="form-control" name="email" type="email" value=<?php echo $data['mail']; ?> required>  
                            </div>  
                            <div class="form-group">  
                              Enter password: <input class="form-control" name="pass" type="password" value=<?php echo $data['password']; ?> pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  
                            </div>
                            <input name="eid" type="hidden" value=<?php echo $data['eid']; ?> >    
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >  
  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
</body>  
  
</html>  