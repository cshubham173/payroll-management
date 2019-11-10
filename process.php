<?php
  session_start();
  include("connection.php");
  $username = $_POST['user'];
  $password = $_POST['pass'];
  $radio = $_POST['entity'];
  if($radio == 'emp'){
    $result = mysqli_query($dbConnected, "select * from emp_table where e_id = '$username' and e_password = '$password'")
                    or die("Failed to query database ");
    $row = mysqli_fetch_array($result);
    if($row['e_id'] == $username && $row['e_password'] == $password){
      //echo "Login success!! Welcome ".$row['a_id'];
      //$_SESSION['con'] = $dbConnected;
      $_SESSION["emp_id"] = $username;
      header("Location: employee.php");
      }
      else{
echo '<script language="javascript">';
echo 'window.location.href="index.html";';
echo 'alert("INVALID USERID OR PASSWORD");';
echo '</script>';
        //  header("Location: index.html");
      }
  }elseif($radio == 'admin'){
    $result = mysqli_query($dbConnected, "select * from admin_table where a_id = '$username' and a_password = '$password'")
                    or die("Failed to query database ");
    $row = mysqli_fetch_array($result);
    if($row['a_id'] == $username && $row['a_password'] == $password){
      echo "Login success!! Welcome ".$row['a_id'];
      //$_SESSION['con'] = $dbConnected;
      $_SESSION["a_id"] = $username;
      header("Location: admin.php");
      }
      else{
        echo '<script language="javascript">';
        echo 'window.location.href="index.html";';
        echo 'alert("INVALID USERID OR PASSWORD");';
        echo '</script>';
      }
  }else{
     "Please select if you are an employee or an admin";
    header("Location: index.html");
  }

?>
