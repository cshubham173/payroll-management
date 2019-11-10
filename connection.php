<?php
$dbConnected = mysqli_connect("localhost","root","","payroll");
$dbSelected = mysqli_select_db($dbConnected, "payroll");

if($dbConnected){
  //echo "Mysql connected to the server";
  if($dbSelected){
    //echo "Database Connected Successfully";
  }
  else{
    //echo "Database Connection failed";
  }
}
else{
  //echo "mysql connection failed";
}
?>
