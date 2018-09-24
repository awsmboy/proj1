<?php

$con=mysqli_connect('localhost','root','');
if($con==false){
	echo"no connection";
}


mysqli_select_db($con,'cafemgmt');
?>