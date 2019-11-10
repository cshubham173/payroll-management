<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CALC SALARY</title>

    <link rel="stylesheet" href="styles/layout_emp.css" type="text/css">

  </head>
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

    <div class="wrapper row2">
      <div id="container">

              <?php
              session_start();
              $eid = $_SESSION['id'];
              include("connection.php");
              $get_class = "SELECT e_class FROM emp_table WHERE e_id = $eid";
              $result = mysqli_query($dbConnected, $get_class);
              $row = mysqli_fetch_array($result);

              $get_class_details = "SELECT * FROM classes WHERE e_class = ".$row['e_class']."";
              $result2 = mysqli_query($dbConnected, $get_class_details);
              $row2 = mysqli_fetch_array($result2);


               ?>


  <form class="salbox" action="salary.php" method="post">
    <table class="calsal">

    <tr>
      <th><label>Employee ID:</label>
      <input type="text" name="" value="<?php echo $eid; ?>" placeholder=""></th>
    </tr>

    <tr>
      <td><label>Class:</label>
      <input type="text" name="" value="<?php echo $row['e_class']; ?>"></td>

      <td><label>Number of days present:</label>
      <input type="text" name="working_days" value=""></td>
    </tr>

    <tr>
      <td><label>Basic:</label>
      <input type="text" name="basic" value="<?php echo $row2['basic']; ?>"></td>
    </tr>

    <tr>
      <td><label>Payscale:</label>
      <input type="text" name="" value="<?php echo $row2['pay_scale']; ?>"></td>

      <td><label>Grade Pay:</label>
      <input type="text" name="grade" value="<?php echo $row2['grade_pay']; ?>"></td>
    </tr>
<?php $da = 1.42*($row2['basic'] + $row2['grade_pay']); ?>
    <tr>
      <td><label>DA:</label>
      <input type="text" name="da" value="<?php echo $da; ?>"></td>
<?php $hra = 0.3*($row2['basic'] + $row2['grade_pay']); ?>

      <td><label>HRA:</label>
      <input type="text" name="hra" value="<?php echo $hra; ?>"></td>
    </tr>
<?php $pf = 0.12*($row2['basic'] + $row2['grade_pay']); ?>
    <tr>
      <td><label>PF:</label>
      <input type="text" name="pf" value="<?php echo -$pf; ?>"></td>
<?php $tax = 0.015*($row2['basic'] + $row2['grade_pay']); ?>
      <td><label>Tax:</label>
      <input type="text" name="tax" value="<?php echo -$tax ?>"></td>
    </tr>
    </table>
<?php
if(isset($_POST['submit'])){
    $gross = ( ( ($_POST['basic']+$_POST['grade']+$_POST['da']+$_POST['hra']) - ($_POST['pf'] + $_POST['tax']) ) / 30)*$_POST['working_days'];
    $wd = $_POST['working_days'];
  /*$send_to_salary = "INSERT INTO `salary` (`e_id`, `da`, `hra`, `pf`, `inc_tax`, `working_days`, `salary`)
  VALUES ($eid, $da, $hra, $pf, $tax, $wd, $gross)";*/
  $send_to_salary = "UPDATE `salary` SET e_id=$eid, da=$da, hra=$hra, pf=$pf, inc_tax=$tax, working_days=$wd, salary=$gross WHERE e_id=$eid";
 mysqli_query($dbConnected, $send_to_salary);
 /*if (mysqli_query($dbConnected, $send_to_salary)) {
  echo "New record created successfully !";
 } else {
  echo "Error: " . $send_to_salary . "
 " . mysqli_error($dbConnected);
}*/
  }
 ?>
    <div class="salbox">
    <label><b>SALARY</b></label>
    <input type="text" name="end_salary" value="<?php if(isset($gross)){echo $gross;} ?>" >

    <br>
    <button type="submit" name="submit" class="back">CALCULATE SALARY</button>
    <button type="submit" name="done" class="back">
      <a href="javascript:window.close()";>DONE</a></button>
    </div>
  </form>
      </div>
      </div>

      <footer class="strip">&nbsp</footer>

  </body>
</html>
