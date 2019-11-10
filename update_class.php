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
  include("connection.php")
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
      <h2 class="title"><a href="admin.php">Admin Dashboard</a></h2>
      <nav>
        <ul>
          <li><a href="update_class.php">UPDATE CLASS DEFINITION</a></li>
          <li class="last"><a href="show_salaries.php">SHOW ALL SALARIES</a></li>
          <li><a href="addnew.php">ADD NEW EMPLOYEE</a></li>
        </ul>
    </aside>
  </td>
</tr>
<tr>
  <td>
    <!-- main content -->
    <form class="addnew" action="update_class.php" method="post">

      <label>CLASS</label>
      <input type="text" name="class" value="">

      <label>PAY-SCALE</label>
      <input type="text" name="pay_from" value="" placeholder="From">
      <input type="text" name="pay_to" value="" placeholder="To">

      <label>BASIC</label>
      <input type="text" name="basic" value=""><br>

      <label>GRADE PAY</label>
      <input type="text" name="grade_pay" value=""><br>
      <button type="submit" name="submit" class="addbtn">UPDATE CLASS DEFINITION</button>
    </form>

  </td>
</tr>

    <div id="content">
      <?php
      if(isset($_POST['submit'])){
       $class = $_POST['class'];
       $payfrom = $_POST['pay_from'];
       $payto = $_POST['pay_to'];
       $payscale = "$payfrom-$payto";
       $basic = $_POST['basic'];
       $grade = $_POST['grade_pay'];
      $update_class_definition = "UPDATE `classes` SET `e_class` = $class, `pay_scale` = '".$payscale."', `basic` = $basic, `grade_pay` = $grade WHERE `classes`.`e_class` = $class;";
      mysqli_query($dbConnected, $update_class_definition);
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
