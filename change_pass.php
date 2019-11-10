<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>ADMIN</title>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="styles/layout_emp.css" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>

<script type="text/javascript">

</script>

<style media="screen">
  <?php session_start();
  include("styles/layout_emp.css");
  include("connection.php");
  echo $_SESSION['emp_id'];
  echo "hello";
   ?>
</style>

<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">PAYROLL MANAGEMENT SERVICES</a></h1>
    </div>
    <nav class="navbar">
      <ul>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="clear"></div>
  </header>
</div>
<!-- content -->


<div class="wrapper row2">
  <div id="container">
    <!-- content body -->

<table>
  <tr>
    <td>
    <aside id="left_column">
      <h2 class="title"><a href="employee.php">Employee Dashboard</a></h2>
      <nav>
        <ul>
        </ul>
    </aside>
  </td>
</tr>
<tr>
  <td>
    <!-- main content -->
    <form class="addnew" action="change_pass.php" method="post">

      <label>ENTER CURRENT PASSWORD</label>
      <input type="text" name="curr" value="">

      <label>CONFIRM CURRENT PASSWORD</label>
      <input type="text" name="conf" value="" placeholder="">

      <label>ENTER NEW PASSWORD</label>
      <input type="text" name="new" value=""><br>

      <button type="submit" name="submit" class="addbtn">CHANGE PASSWORD</button>
    </form>

  </td>
</tr>

    <div id="content">
      <?php
      if(isset($_POST['submit'])){
       $current_password = $_POST['curr'];
       $confirm_password = $_POST['conf'];
       $new_password = $_POST['new'];
       $query = "SELECT e_password FROM emp_table WHERE e_id = '".$_SESSION['emp_id']."'";
       $result = mysqli_query($dbConnected, $query);
       $row=mysqli_fetch_assoc($result);
       $t = $_SESSION['emp_id'];
       if($current_password == $row['e_password'] && $confirm_password == $row['e_password']){
         $query1 = "UPDATE `emp_table` SET `e_password` = '$new_password' WHERE `emp_table`.`e_id` = $t";
         $result1 = mysqli_query($dbConnected, $query1);
       }
       else{
         echo '<script language="javascript">';
         echo 'window.location.href="change_pass.php";';
         echo 'alert("INVALID PASSWORD");';
         echo '</script>';
       }

      /*if (mysqli_query($dbConnected, $update_class_definition)) {
       //echo "New record created successfully !";
      } else {
       echo "Error: " . $update_class_definition . "
      " . mysqli_error($dbConnected);
    }*/
}
       ?>
  </div>
    <tr>
      <td>
    <!-- / content body -->


</td>
</tr>
  </div>
</div>

</body>
</html>
