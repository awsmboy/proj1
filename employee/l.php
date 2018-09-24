<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin for employee</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div class="container">
    <form class="form-signin"  action="login.php"  method="post">
      <img class="mb-4" src="images\u3.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please Log in</h1>    
       <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
      </div>
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div><br>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Log in</button><br>
      <p class="mt-5 mb-3 text-muted">&copy; MITCOE_2018-2019</p>
    </form>
  </div>
  </body>
</html>
<?php
include("dbcon.php");
if (isset($_POST['login']))
{

session_start();
$mail=$_POST['user'];
$pass=$_POST['password'];

$sql="select * from employee where mail='$mail' AND password='$pass'";

$result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1)
  {
    $res=mysqli_fetch_array($result);
    $_SESSION['username']=$res['name'];
    header('location:home.php');
  }
  else
  {
    ?>
    <script>
    alert('Username or password is incorrect !!');
    window.open('login.php','_self');
    </script>
    <?php
    
  }
}
?>

