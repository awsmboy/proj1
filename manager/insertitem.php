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
                    <h3 class="panel-title">Insert Item details</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="insertitem.php" enctype="multipart/form-data">  
                        <fieldset>  
                            <div class="form-group">  
                               Enter Item desc/name: <input class="form-control" placeholder="name" name="name" type="text" pattern="[A-Za-z ]{1-32}" title="Only Letters allowed" required autofocus> 
                            </div>  
                            <div class="form-group">  
                               Enter Item price: <input class="form-control" placeholder="price" name="price" type="text" pattern="\d+(\.\d+)?"  required>  
                            </div> 
                            <div class="form-group">  
                               Upload image: <input class="form-control" name="img" type="file" required>  
                            </div>   
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
 
<?php  
  
include("dbcon.php");//make connection here  
if(isset($_POST['submit']))  
{  
    $name=$_POST['name'];//here getting result from the post array after submitting the form. 
    $price=$_POST['price']; 
    $imgname=$_FILES['img']['name'];
    $tmpname=$_FILES['img']['tmp_name'];

    move_uploaded_file($tmpname, "images/$imgname");
    
    $check_query="select * from item WHERE idesc='$name'";  
    $run_query=mysqli_query($con,$check_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
        echo "<script>alert('Item $name is already exist in our database, Please try another one!')</script>";  
        exit();  
    } 

//insert the emp into the database.  
    $sql="INSERT INTO `item` (`idesc`, `price`,`img`) VALUES ('$name', '$price','$imgname');";  
    $run=mysqli_query($con,$sql); 

    if($run==true)
    {  
        echo"<script>window.open('home.php','_self')</script>";  
        
    }  
  

}  
  
?>