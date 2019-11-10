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
  function open_popup(){
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }
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
          <li><a href="calculate_all.php">CALCULATE SALARIES</a></li>
        </ul>
    </aside>
    <!-- main content -->
  </td>
</tr>
<tr>
  <td>
    <div id="content">
      <div class="employee_display">
        <table style="width:100%; top:50%;" id="table1">
          <tr>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Designation</th>
            <th>Class</th>
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
              $query = "select * from emp_table";
            }
              $result = mysqli_query($dbConnected,$query);
              $a=mysqli_num_rows($result);
              if ($a>0){
                while($row=mysqli_fetch_assoc($result))
                {
                  $_SESSION['id'] = $row['e_id'];
                  $_SESSION['name'] = $row['e_name'];
                  $_SESSION['desig'] = $row['e_designation'];
                  $_SESSION['class'] = $row['e_class'];
                  $_SESSION['dob'] = $row['e_dob'];
                  $_SESSION['addr'] = $row['e_addr'];
                ?>

              <td><?php echo $row['e_name']; ?></td>
              <td><?php echo $row['e_id']; ?></td>
              <td><?php echo $row['e_designation']; ?></td>
              <td><?php echo $row['e_class']; ?></td>
              <?php
              if(isset($_POST['submit'])){

               ?>
              <td><a href="view_emp.php" target="_blank"><button type="submit" name="cal_sal" class="searchButton" id="myBtn" onclick="open_popup();">View</button></td>
              <td><a href="salary.php" target="_blank"><button type="submit" name="cal_sal" class="searchButton">Calc Salary</button></a></td>
<?php } ?>
          </tr>
          <?php
            }
          }
            ?>
          </table>

  </div>
  </div>
    <tr>
      <td>
    <!-- / content body -->
    <div class="clear">
      <div class="wrap">
      <form class="srchbar" action="admin.php" method="post">
        <input type="text" class="searchTerm" name="searchemp" placeholder="Search for an employee">
        <button type="submit" name="submit" class="searchButton">
        <i class="fa fa-search"></i>
        </button>
        <button type="all" name="all" class="searchButton">
        All
        </button>
      </form>
    </div>
    </div>

</td>
</tr>
  </div>
</div>

</body>
</html>
