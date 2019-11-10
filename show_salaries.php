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
      <h2 class="title"><a href="admin.php">Admin Dashboard</a></h2>
      <nav>
        <ul>
          <li><a href="update_class.php">UPDATE CLASS DEFINITION</a></li>
          <li class="last"><a href="show_salaries.php">SHOW ALL SALARIES</a></li>
          <li><a href="addnew.php">ADD NEW EMPLOYEE</a></li>
        </ul>
    </aside>
    <!-- main content -->
    <table style="width:70%; top:50%; left:10%;" id="table2">
      <tr>
        <th>Employee ID</th>
        <th>Dearness Allowance</th>
        <th>House Rent Allowance</th>
        <th>PF</th>
        <th>Income Tax</th>
        <th>Working Days</th>
        <th>Net Salary</th>
      </tr>
    </td>
  </tr>

      <tr>

        <?php
        //session_start();
        if($_SESSION['a_id'] == true){
        }else{
          header("location: index.html");
        }
        include("connection.php");
        /*$dbConnected = mysqli_connect ('localhost','root','','payroll');
        $dbSelected = mysqli_select_db($dbConnected, 'payroll');*/
        /*$emp = $_POST['searchemp'];*/
        if(isset($_POST['submit'])){
          $query = "select * from emp_table where e_id='".$_POST['searchemp']."'";
        }elseif(isset($_POST['all'])){
          $query = "select * from emp_table";
        }
        else{
          $query = "select * from salary";
        }
          $result = mysqli_query($dbConnected,$query);
          $a=mysqli_num_rows($result);
          if ($a>0){
            while($row=mysqli_fetch_assoc($result))
            {
              $_SESSION['id'] = $row['e_id'];
              $_SESSION['da'] = $row['da'];
              $_SESSION['hra'] = $row['hra'];
              $_SESSION['pf'] = $row['pf'];
              $_SESSION['inc_tax'] = $row['inc_tax'];
              $_SESSION['working_days'] = $row['working_days'];
              $_SESSION['salary'] = $row['salary'];
            ?>

          <td><?php echo $row['e_id']; ?></td>
          <td><?php echo $row['da']; ?></td>
          <td><?php echo $row['hra']; ?></td>
          <td><?php echo $row['pf']; ?></td>
          <td><?php echo $row['inc_tax']; ?></td>
          <td><?php echo $row['working_days']; ?></td>
          <td><?php echo $row['salary']; ?></td>
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
