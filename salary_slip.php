  <p style="text-align: center;"><strong>PAYROLL MANAGEMENT SERVICES</strong></p>
<div align = "right">
  <button type="submit" name="print" class="searchButton" onclick = "window.print()">PRINT</button>
</div>
<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
table tr:nth-child(even) {
  background-color: #eee;
}
table tr:nth-child(odd) {
 background-color: #fff;
}
table th {
  background-color: black;
  color: white;
}
.searchButton {
  width: 100px;
  height: 36px;
  border: 1px solid #458500;
  background: #458500;
  text-align: center;
  color: #FFFFFF;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  font-size: 15px;
}
</style>
<?php session_start();
  //require("employee.php");
      include("connection.php");
      $query = "SELECT * FROM salary WHERE e_id = '".$_SESSION['emp_id']."' ";
      $result = mysqli_query($dbConnected, $query);
      $row = mysqli_fetch_assoc($result);
      //echo $row['da'];
      $query1 = "SELECT * FROM classes WHERE e_class = '".$_SESSION['class']."' ";
      //echo $_SESSION['class'];
      $result1 = mysqli_query($dbConnected, $query1);
      $row1 = mysqli_fetch_assoc($result1);
      //echo $row1;
?>

<table style="height: 220px; width: 574px; margin-left: auto; margin-right: auto;" border= "1">
<tbody>
<tr>
<td style="width: 160px;" rowspan="2">&nbsp;</td>
<td style="width: 387px; text-align: center;" colspan="2">SALARY SLIP</td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 387px; text-align: center;" colspan="2">MONTH-YEAR</td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 160px;">Name:&nbsp;</td>
<td style="width: 203px;">&nbsp;<?php echo $_SESSION['name']; ?></td>
<td style="width: 184px;">Designation:</td>
<td style="width: 202px;">&nbsp;<?php echo $_SESSION['desig']; ?></td>
</tr>
<tr>
<td style="width: 160px;">Employee ID:</td>
<td style="width: 203px;"><?php echo $_SESSION['emp_id']; ?></td>
<td style="width: 184px;">&nbsp;Date:</td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 363px;" colspan="2"><strong>Description</strong></td>
<td style="width: 184px;">&nbsp;<strong>Earnings</strong></td>
<td style="width: 202px;">&nbsp;<strong>Deductions</strong></td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">Basic</td>
<td style="width: 184px;">&nbsp;<?php echo $row1['basic']; ?></td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">Grade Pay</td>
<td style="width: 184px;">&nbsp;<?php echo $row1['grade_pay']; ?></td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">Dearance Allowance</td>
<td style="width: 184px;">&nbsp;<?php echo $row['da']; ?></td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">House Rent Allowance</td>
<td style="width: 184px;">&nbsp;<?php echo $row['hra']; ?></td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">Provident Fund</td>
<td style="width: 184px;">&nbsp;</td>
<td style="width: 202px;">&nbsp;<?php echo $row['pf'] ?></td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">Income Tax</td>
<td style="width: 184px;">&nbsp;</td>
<td style="width: 202px;">&nbsp;<?php echo $row['inc_tax'] ?></td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">Working Days</td>
<td style="width: 184px;">&nbsp;</td>
<td style="width: 202px;">&nbsp;<?php echo $row['working_days'] ?></td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">&nbsp;</td>
<td style="width: 184px;">&nbsp;</td>
<td style="width: 202px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">Total</td>
<td style="width: 184px;">&nbsp;<?php echo $add = $row1['basic']+$row1['grade_pay']+$row['da']+$row['hra'] ?></td>
<td style="width: 202px;">&nbsp;<?php echo $ded = $row['pf']+$row['inc_tax'] ?></td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">&nbsp;</td>
<td style="width: 184px; text-align: center;" colspan="2">NET SALARY</td>
</tr>
<tr>
<td style="width: 160px;" colspan="2">&nbsp;</td>
<td style="width: 184px; text-align: center;" colspan="2">&nbsp;<?php echo $row['salary']; ?></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p style="text-align: center;">-------------------------&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;---------------------------</p>
<p style="text-align: center;">Employee Signature&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Director Signature</p>
