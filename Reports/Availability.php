<?php
require "database.php";
//include("../Rheader.php");
?>
<html><body><form method="post">
<?php
$qry=mysqli_query($con,"select distinct allocated_emp_id from tbl_resource_allocation where allocated_emp_id!='' order by allocated_emp_id");

echo "<center><table border=1 class='t2'><h2>Employee Availability</h2>";
echo "<tr><th>Employee ID</th><th>Name</th><th>Not Available Till Date</th></tr>";
while($row=mysqli_fetch_array($qry))
{
  $qryava=mysqli_query($con,"select * from tbl_resource_allocation where dresource_enddate in (select max(dresource_enddate) from tbl_resource_allocation where allocated_emp_id='$row[allocated_emp_id]')");
    if($row1=mysqli_fetch_array($qryava))
    {
       $sqlemp=mysqli_query($con,"select * from tbl_emp where vchemp_id='$row[allocated_emp_id]'");
        $remp=mysqli_fetch_array($sqlemp);
      echo "<tr><td>$row[allocated_emp_id]</td>";
       echo "<td>$remp[vchemp_Fname] $remp[vchemp_Lname]</td>";
      echo "<td>$row1[dresource_enddate]</td></tr>";
      //echo "<td>$row1[vchproject_id]</td>";
    }
}
echo "</table>";

$qry1=mysqli_query($con,"select distinct allocated_emp_id from tbl_resource_allocation where allocated_emp_id!='' order by allocated_emp_id");
echo "<br><table border=1 class='t2'><h2>Employee Available in next 15 Days</h2>";
echo "<tr><th>Employee ID</th><th>Name</th><th>Not Available Till Date</th></tr>";
while($row1=mysqli_fetch_array($qry1))
{
  $qryava1=mysqli_query($con,"select * from tbl_resource_allocation where dresource_enddate in (select max(dresource_enddate) from tbl_resource_allocation where allocated_emp_id='$row1[allocated_emp_id]')");
    if($row2=mysqli_fetch_array($qryava1))
    {
      $current= time() . "<br>";
      $date=strtotime($row2['dresource_enddate']);
      $datediff= $date-$current;
      $difference=floor($datediff/(60*60*24)) ;
      //echo $difference;
        //echo "<br>$row2[dresource_enddate]</br>";
      if($difference>=1 && $difference<=15)
      {
        $sqlemp=mysqli_query($con,"select * from tbl_emp where vchemp_id='$row1[allocated_emp_id]'");
        $remp=mysqli_fetch_array($sqlemp);
        echo "<tr><td>$row1[allocated_emp_id]</td>";
        echo "<td>$remp[vchemp_Fname] $remp[vchemp_Lname]</td>";
        echo "<td>$row2[dresource_enddate]</td></tr>";
        //echo "<td>$row1[vchproject_id]</td>";
      }
    }
}
echo "</table>";

?>
  <br>
<input type="submit" value="Export to excel" name="btnxcl" class="b">
<input type="submit" value="Back" name="btnback" class="b">
</form>
   </body>

</center>
</html>
<?php
  if(isset($_POST['btnxcl']))
  {
    // The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=availability.xls");
 
// Add data table
include 'Availability.php';

  }
?>
<?php
if(isset($_POST['btnback']))
  {
    echo "<script>window.location.href='../Admin/home.php';</script>";
  }

?>