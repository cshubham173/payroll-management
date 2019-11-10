<html lang="en" dir="ltr">
<head>
<title>EMPLOYEE</title>
<link rel="stylesheet" href="styles/layout_emp.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<style media="screen">
  <?php

  session_start();
  if($_SESSION['emp_id'] == true){
  }else{
    header("location: index.html");
  }
  include("styles/layout_emp.css"); ?>
  table td{
    color: #ffffff;
    left: 20px;
  }
</style>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">PAYROLL MANAGEMENT SYSTEM</a></h1>
    </div>
    <nav>
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
    <aside id="left_column">
      <h2>Employee Dashboard</h2>
      <nav>
        <ul>
          <li><a href="change_pass.php">Change Password</a></li>
          <li><a href="salary_slip.php">Show Salary Slip</a></li>
          <li class="last"><a href="show_history.php">Show Payment History</a></li>
        </ul>
      </nav>
    </aside>
      <table class="prof" cellpadding="2" align="center">
        <tr>
          <td><h2 class="title">PROFILE</h2></td>
        </tr>
        <tr>
          <td><img src="profile photo.jpg" height="",width=""></td>
        </tr>

        <?php
        include("connection.php");
        //session_start();
        /*$dbConnected = mysqli_connect ('localhost','root','','payroll');
        $dbSelected = mysqli_select_db($dbConnected, 'payroll');*/
        $emp = $_SESSION['emp_id'];
        $query = "SELECT e.*, DATE_FORMAT(e_dob, \"%M %e %Y\") FROM emp_table e WHERE e.e_id = $emp";
        $result = mysqli_query($dbConnected,$query);

        $a=mysqli_num_rows($result);
        if ($a>0){
          while($row=mysqli_fetch_assoc($result))
          {
            $name = $row['e_name'];
            $id = $row['e_id'];
            $id = $row['e_id'];
            $desig = $row['e_designation'];
            $class = $row['e_class'];
            $dob = $row['DATE_FORMAT(e_dob, "%M %e %Y")'];
            $addr = $row['e_addr'];
            //$no = $row['ph_no'];
            $_SESSION['class'] = $row['e_class'];
            $_SESSION['desig'] = $row['e_designation'];
            $_SESSION['name'] = $row['e_name'];
          }
        }


          ?>

              <tr>
                <td>NAME : </td>
                <td><?php echo $name; ?></td>
              </tr>
              <tr>
                <td>EMPLOYEE ID : </td>
                <td><?php echo $id; ?></td>
              </tr>
              <tr>
                <td>DESIGNATION : </td>
                <td><?php echo $desig; ?></td>
              </tr>
              <tr>
                <td>CLASS : </td>
                <td><?php echo $class; ?></td>
              </tr>
              <tr>
                <td>DATE OF BIRTH : </td>
                <td><?php echo $dob; ?></td>
              </tr>
              <tr>
                <td>CITY : </td>
                <td><?php echo $addr; ?></td>
              </tr>
              <tr>
                <td>CONTACT NO : </td>

<?php
$query = "SELECT * FROM contacts WHERE eid = $emp";
$result = mysqli_query($dbConnected,$query);

$a=mysqli_num_rows($result);
if ($a>0){
  while($row=mysqli_fetch_assoc($result))
  {
      $no = $row['ph_no'];
 ?>

                <td><?php echo $no; ?></td>
  <?php
}
} ?>  
              </tr>
            </table>

    <!-- main content -->
    <div id="content">
      <!-- section 1 -->

      <!-- section 2 -->

    </div>
    <!-- / content body -->
    <div class="clear"></div>
  </div>
</div>
<!-- footer -->

</body>
</html>
