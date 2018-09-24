<?php
 
 session_start();
 if(!isset($_SESSION['username'])){
	header('location:login.php');
 }
?>

<html>
 <head>
	<title></title>
	<link href="bootstrap-4.1.3-dist\css\bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
	<h2 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?></h2>
	<h4 align="right"><a href="logout.php">LogOut</a></h4>
</div>
</body>
</html>	