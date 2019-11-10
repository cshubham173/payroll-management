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
  table#table1 {
     width:70%;
     margin-top: 0px;
     margin-left:50%;
     margin-right:15%;
   }
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
    <table  id="table1">
    <form class="" action="calculate_all.php" method="post">
      <tr>
         <th>
           <select class="" name="class">
             <option value="0" default>Select Class of Employee</option>
             <option value="1">Class I</option>
             <option value="2">Class II</option>
             <option value="3">Class III</option>
           </select>
         </th>
         <th>           <button type="submit" name="submit" class="back">OK</button></th>
       </tr>
       <tr>
         <?php if(isset($_POST['submit'])){
           $_SESSION['class'] = $_POST['class'];
           if($_POST['class'] == 1){
             $c = "CLASS I";
           }elseif ($_POST['class'] == 2) {
             $c = "CLASS II";
           }elseif ($_POST['class'] == 3) {
            $c = "CLASS III";
          }?>
          <th><h6><?php echo $c; ?></h6></th>

<?php   } ?>

       </tr>
      <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Working Days</th>
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
      if(isset($_POST['submit']) /*or isset($_POST['calculate'])*/){
          $query = "select * from emp_table WHERE e_class = '".$_POST['class']."'";
          $result = mysqli_query($dbConnected,$query);
          $a=mysqli_num_rows($result);
          if ($a>0){
            while($row=mysqli_fetch_assoc($result))
            {
            ?>
          <td> <input type="text" name="ide[]" value="<?php echo $row['e_id'];?>"> </td>
          <td><?php echo $row['e_name']; ?></td>
          <td> <input type="text" name="wd[]" value=""> </td>
      </tr>
      <?php
        }
      }
    }
        ?>
        <tr>


            <?php
            if (isset($_POST['calculate'])) {
              $wd = array();
              $ide = array();
              $gross = array();
              $wd = $_REQUEST['wd'];
              $ide = $_REQUEST['ide'];
              $class = $_SESSION['class'];
              for ($i=0; $i < count($ide); $i++) {
                $get_class_details = "SELECT * FROM classes WHERE e_class = $class";
                $result = mysqli_query($dbConnected, $get_class_details);
                $row2 = mysqli_fetch_array($result);
                $da = 1.42*($row2['basic'] + $row2['grade_pay']);
                $hra = 0.3*($row2['basic'] + $row2['grade_pay']);
                $pf = 0.12*($row2['basic'] + $row2['grade_pay']);
                $tax = 0.015*($row2['basic'] + $row2['grade_pay']);
                $gross[$i] = ( ( ($row2['basic']+$row2['grade_pay']+$da+$hra) - ($pf + $tax) ) / 30)*$wd[$i];
                $send_to_salary = "UPDATE `salary` SET e_id=$ide[$i], da=$da, hra=$hra, pf=$pf, inc_tax=$tax, working_days=$wd[$i], salary=$gross[$i] WHERE e_id=$ide[$i]";
                mysqli_query($dbConnected, $send_to_salary);
              }

              $query = "select * from emp_table WHERE e_class = $class";
              $result = mysqli_query($dbConnected,$query);
              $i = 0;
              $a=mysqli_num_rows($result);
              if ($a>0){
                while($row=mysqli_fetch_assoc($result))
                {

?>
              <tr>
                  <td> <input type="text" name="ide[]" value="<?php echo $row['e_id'];?>"> </td>
                  <td><?php echo $row['e_name']; ?></td>
                  <td> <input type="text" name="wd[]" value="<?php echo $wd[$i];; ?>"> </td>
                  <td> <input type="text" name="salary" value="<?php echo $gross[$i]; $i++; ?>"> </td>
              </tr>

          <?php  }
          }
            }

             ?>
             <tr>
             <td><input class="back" type="submit" name="calculate" value="CALCULATE SALARIES"> <a href="#table1"></a> </input> </td>
             </tr>
          </form>
        </tr>
      </table>


  </div>
</div>

</body>
</html>
