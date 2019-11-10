<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VIEW EMPLOYEE</title>

    <link rel="stylesheet" href="styles/layout_emp.css" type="text/css">

  </head>
  <body>
<?php session_start(); include 'connection.php';?>
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
        <table class="prof" cellpadding="7px" align="center">
          <tr>
            <td><h2 class="title">PROFILE</h2></td>
          </tr>
          <tr>
            <td><img src="profile photo.jpg" height="",width=""></td>
          </tr>
                <tr>
                  <td>NAME : </td>
                  <td><?php echo $_SESSION['name']; ?></td>
                </tr>
                <tr>
                  <td>EMPLOYEE ID : </td>
                  <td><?php echo $_SESSION['id']; ?></td>
                </tr>
                <tr>
                  <td>DESIGNATION : </td>
                  <td><?php echo $_SESSION['desig']; ?></td>
                </tr>
                <tr>
                  <td>CLASS : </td>
                  <td><?php echo $_SESSION['class']; ?></td>
                </tr>
                <tr>
                  <td>DATE OF BIRTH : </td>
                  <td><?php echo $_SESSION['dob']; ?></td>
                </tr>
                <tr>
                  <td>CITY : </td>
                  <td><?php echo $_SESSION['addr']; ?></td>
                </tr>
                <tr>
                  <td>CONTACT NO : </td>
                  <?php
                  $query = "SELECT * FROM contacts WHERE eid = '".$_SESSION['id']."'";
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
                <tr>
                  <td><button type="submit" name="button" class="back"><a href="javascript:window.close();">OK</a></button></td>
                </tr>
              </table>

      </div>

      <footer class="strip">&nbsp</footer>

  </body>
</html>
