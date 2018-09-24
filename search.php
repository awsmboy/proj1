<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","cafemgmt");
    $query=mysqli_query($con, "select * from item ");
    while($row=mysqli_fetch_assoc($query))
    { $array[0] = $row['iid'];
      $array[1] = $row['idesc'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>