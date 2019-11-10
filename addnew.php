<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADD NEW EMPLOYEE</title>

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
        <!-- content body -->

    <table>

        <tr>
          <td>
              <aside id="left_column">
              <h2 class="title"><a href="admin.php">Admin Dashboard</a></h2>
              <nav>
                <ul>
                  <li><a href="#">UPDATE CLASS DEFINITION</a></li>
                  <li class="last"><a href="#">SHOW ALL SALARIES</a></li>
                  <li><a href="#">ADD NEW EMPLOYEE</a></li>
                </ul>
              </aside>
          </td>

          <td style="width: 40%;position: absolute;top:35%;left: 75%;transform: translate(-50%, -50%);"><h3>EMPLOYEE DETAILS</h3></td>
        </tr>

        <tr>
          <td></td>
          <td>

            <form class="addnew" action="addnew.php" method="post">

              <label>Name</label>
              <input type="text" name="name" value="">

              <label>Designation</label>
              <input type="text" name="desig" value="">

              <label>Email</label>
              <input type="email" name="email" value=""><br>

              <label>Contact Number</label>
              <input type="text" name="cont" value=""><br>
              <input type="text" name="cont2" value=""><br>

              <label>Date of birth</label>
              <input type="date" name="dob" value=""><br>

              <label>Address</label>
              <input type="text" name="address" value="">

              <label>Gender</label><br>
              <input type="radio" name="gender" value="M"> Male<br>
              <input type="radio" name="gender" value="F"> Female<br>

              <br><br>
              <label>Class</label>
              <select name="empclass">
                <option value="1" >Class I</option>
                <option value="2" >Class II</option>
                <option value="3" >Class III</option>
              </select>

              <button type="submit" name="submit" class="addbtn">ADD EMPLOYEE</button>
            </form>

              <?php
              include("connection.php");
              if(isset($_POST['submit'])){
                $query = "INSERT INTO `emp_table` (`e_id`, `e_name`,
                  `e_designation`, `e_dob`, `e_addr`, `e_mail`, `e_password`,
                  `e_gender`, `e_class`)
                  VALUES (NULL, '".$_POST['name']."', '".$_POST['desig']."', '".$_POST['dob']."', '".$_POST['address']."', '".$_POST['email']."', 'ruchak', '".$_POST['gender']."', '".$_POST['empclass']."' )";
                  if (mysqli_query($dbConnected, $query)) {
                   //echo "New record created successfully !";
                  } else {
                   echo "Error: " . $query . "
                  " . mysqli_error($dbConnected);
                  }

                  $query1 = "SELECT e_id FROM emp_table ORDER BY e_id DESC";
                  $result = mysqli_query($dbConnected, $query1);
                  $row=mysqli_fetch_assoc($result);
                  //echo $row['e_id'];
                  $abhi = $row['e_id'];
                  $query2 = " INSERT INTO `contacts` (`eid`, `ph_no`) VALUES ($abhi , '".$_POST['cont']."') ";
                  mysqli_query($dbConnected, $query2);
                  $query3 = " INSERT INTO `contacts` (`eid`, `ph_no`) VALUES ($abhi , '".$_POST['cont2']."') ";
                  mysqli_query($dbConnected, $query3);
              }
              //$result = mysqli_query($dbConnected,$query);


            /*  echo $_POST['name'];
              echo $_POST['desig'];
              echo $_POST['dob'];
              echo $_POST['address'];
              echo $_POST['empclass'];
              echo $_POST['email'];
*/
               ?>

          </td>
        </tr>

    </table>

    </div>
    </div>

    <footer class="strip">&nbsp</footer>

  </body>

</html>
