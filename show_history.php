<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>EMPLOYEE</title>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="styles/layout_emp.css" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>

<script type="text/javascript">

</script>

<style media="screen">
  <?php session_start();
  include("styles/layout_emp.css"); ?>
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
    <!-- main content -->
    <table style="width:70%; top:50%; left:10%;" id="table2">
      <tr>
        <th>Employee ID</th>
        <th>Salary</th>
        <th>Date & Time</th>
      </tr>
    </td>
  </tr>

      <tr>

        <?php
        //session_start();
        if($_SESSION['emp_id'] == true){
        }else{
          header("location: index.html");
        }
        include("connection.php");
        /*$dbConnected = mysqli_connect ('localhost','root','','payroll');
        $dbSelected = mysqli_select_db($dbConnected, 'payroll');*/
        /*$emp = $_POST['searchemp'];*/
          /*$query = "select * from history where eid = '".$_SESSION['emp_id']."'";*/
              $query = "select eid,salary, DATE_FORMAT(time, \"%M %e %Y\") from history where eid = '".$_SESSION['emp_id']."'";
          $result = mysqli_query($dbConnected,$query);
          $a=mysqli_num_rows($result);
          if ($a>0){
            while($row=mysqli_fetch_assoc($result))
            {
            ?>

          <td><?php echo $row['eid']; ?></td>
          <td><?php echo $row['salary']; ?></td>
          <td><?php echo $row['DATE_FORMAT(time, "%M %e %Y")']; ?></td>
      </tr>
      <?php
        }
      }
        ?>
      </table>

  </td>
</tr>
<tr>
  <td>
    <div id="content">

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
