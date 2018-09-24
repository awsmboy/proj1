<?php
 
 session_start();
 if(!isset($_SESSION['username'])){
    header('location:login.php');
 }
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
                    <h3 class="panel-title"> <img class="mb-6" src="images\u2.png" alt="" width="40" height="40"> Insert Employee details</h3>
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="insertemp.php">  
                        <fieldset>  
                        	
                            <div class="form-group">  
                               Enter name: <input class="form-control" placeholder="name" name="name" type="text" pattern="[A-Za-z ]{1-32}" title="Only Letters allowed" required autofocus>
                            </div>  
                            <div class="form-group">  
                               Enter phone: <input class="form-control" placeholder="phone" name="phone" type="text" pattern="[789][0-9]{9}" title="Enter valid Phone number" required>  
                            </div> 
                            <div class="form-group">  
                               Enter email: <input class="form-control" placeholder="E-mail" name="email" type="email" required>  
                            </div>  
                            <div class="form-group">  
                               Enter password: <input class="form-control" placeholder="Password" name="pass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  
                            </div>  
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
  
<?php  
  
include("dbcon.php");//make connection here  
if(isset($_POST['register']))  
{  
    $emp_name=$_POST['name'];//here getting result from the post array after submitting the form. 
    $emp_phone=$_POST['phone']; 
    $emp_pass=$_POST['pass'];//same  
    $emp_email=$_POST['email'];//same  
  
//here query check weather if emp already registered so can't register again.  
    $check_email_query="select * from employee WHERE mail='$emp_email'";  
    $run_query=mysqli_query($con,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $emp_email is already exist in our database, Please try another one!')</script>";  
exit();  
    }  
    $mid=$_SESSION['mid'];
//insert the emp into the database.  
    $sql="INSERT INTO `employee` (`name`, `phone`, `mail`, `password`, `mid`) VALUES ('$emp_name', '$emp_phone', '$emp_email', '$emp_pass', '$mid');";  
    $run=mysqli_query($con,$sql); 

    if($run==true)
    {  
        echo"<script>window.open('home.php','_self')</script>";  
        
    }  
  

}  
  
?>