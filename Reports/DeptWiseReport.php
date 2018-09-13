<html>
   <head>
    <title>graph</title>
    <link  rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- You need to include the following JS file to render the chart.
    When you make your own charts, make sure that the path to this JS file is correct.
    Else, you will get JavaScript errors. -->

    <script src="js/fusioncharts.js"></script>
    <script src="js/themes/fusioncharts.theme.fint.js"></script>
  </head>

   <body>
  <form method="get">
  <center>
   <?php

require "database.php";
//include "../Rheader.php";
$qry=mysqli_query($con,"select * from tbl_dept");
echo "<br><br><br><br><br><br>";
echo "Select Department:   <select name='seldept' class='textbox'>";
while($r1=mysqli_fetch_array($qry))
{
  ?>
 <option value="<?php echo $r1['vchdept_id']; ?>" <?php if(isset($_GET['seldept'])){ if($_GET['seldept']==$r1['vchdept_id']){ echo "selected"; }} ?> > <?php echo $r1['vchdept_name']; ?> </option>
&nbsp;&nbsp;&nbsp;
<?php
}

echo "<input type='submit' value='OK' name='btnok' class='button' style='margin-left:10px;'>";

if(isset($_GET['btnok']))
{
      $q=mysqli_query($con,"select * from tbl_emp where vchdept_id='$_GET[seldept]'");
        echo "<table border='1' class='t2' style='height: 30%'><caption><h2>Employee Details</h2></caption>";
        echo "<tr><th>Employee ID</th><th>Name</th><th>Location</th><th>Band</th><th>Designation</th><th>Sub Department</th></tr>";
        while($r=mysqli_fetch_array($q))
        {
          echo "<tr>";
          echo"<td>$r[vchemp_id]</td>";
          echo"<td>" . $r['vchemp_Fname'] . " " . $r['vchemp_Lname'] . "</td>";
          $lqry=mysqli_query($con,"select * from tbl_location where vchlocation_id='$r[vchlocation_id]'");
          $rl=mysqli_fetch_array($lqry);
          echo"<td>$rl[vchlocation_name]</td>";
          $desqry=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$r[vchdesignation_id]'");
          $rdes=mysqli_fetch_array($desqry);
          echo"<td>$rdes[vchband]</td>";
          echo"<td>$rdes[vchdesignation_name]</td>";
         
          $sdqry=mysqli_query($con,"select * from tbl_subdept where vchSdept_id='$r[vchSdept_id]'");
          $rsd=mysqli_fetch_array($sdqry);
          echo"<td>$rsd[vchSdept_name]</td>";
          echo"</tr>";
        } 
      ?>
      </table>
      <br> <br>
<input type="submit" value="Export to excel" name="btnxcl" class="b">
<a href='../Admin/home.php'><input type="button" value="Back" name="btnback" class="button">
      <?php
}

?>

</center>
</form>
</html>

<?php
  if(isset($_GET['btnxcl']))
  {
    // The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=department.xls");
 
// Add data table
include 'DeptWiseReport.php';

  }
?>
<?php
/*if(isset($_POST['btnback']))
  {
    echo "<script>window.location.href='../Admin/home.php';</script>";
  }
*/
?>