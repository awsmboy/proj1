 <?php
 
 session_start();
 echo $_SESSION['mid'];
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
	<a href="insertemp.php">Insert Employee details</a><br>
	<a href="viewemp.php">View and delete Employee details</a><br>
	<a href="update.php">Update Employee details</a><br>
	<br><br>

	<a href="insertitem.php">Insert Item details</a><br>
	<a href="updateitem.php">Update Item details</a><br>
	<a href="viewitem.php">View and delete Item details</a>

</div>
</body>
</html>