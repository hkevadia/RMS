<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
//include "../header_ph.php";
//include "../Rheader.php";
require_once "database.php";


if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}
/*$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[adminid]' ");
$r=mysqli_fetch_array($q);*/

?>

<div class="font">
<form method="post">
<center>
	<?php	
	$q=mysqli_query($con,"select * from tbl_emp");
	echo "<table border='1' class='t3'><caption><h2>Employee Details</h2></caption>";
	echo "<tr><th>Employee ID</th><th>Name</th><th>Location</th><th>Current Project</th><th>Band</th><th>Designation</th><th>Department</th><th>Sub Department</th></tr>";
	while($r=mysqli_fetch_array($q))
	{
		echo "<tr>";
		echo"<td>$r[vchemp_id]</td>";
		echo"<td>" . $r['vchemp_Fname'] . " " . $r['vchemp_Lname'] . "</td>";
		$lqry=mysqli_query($con,"select * from tbl_location where vchlocation_id='$r[vchlocation_id]'");
		$rl=mysqli_fetch_array($lqry);
		echo"<td>$rl[vchlocation_name]</td>";
		$qpro=mysqli_query($con,"select * from tbl_resource_allocation where allocated_emp_id='$r[vchemp_id]' and dresource_enddate IN (select MAX(dresource_enddate) from tbl_resource_allocation where allocated_emp_id='$r[vchemp_id]')");
		if(mysqli_num_rows($qpro)>0)
{
while($qr=mysqli_fetch_array($qpro))
		{
			$selpro=mysqli_query($con,"select * from tbl_sow where vchproject_id='$qr[vchproject_id]'");
			$rselpro=mysqli_fetch_array($selpro);
		}
		echo "<td>$rselpro[vchproject_name]</td>";
}
else
{
		echo "<td>Bench</td>";
}
		

		$desqry=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$r[vchdesignation_id]'");
		$rdes=mysqli_fetch_array($desqry);
		echo"<td>$rdes[vchband]</td>";
		echo"<td>$rdes[vchdesignation_name]</td>";
		$deptqry=mysqli_query($con,"select * from tbl_dept where vchdept_id='$r[vchdept_id]'");
		$rdept=mysqli_fetch_array($deptqry);
		echo"<td>$rdept[vchdept_name]</td>";
		$sdqry=mysqli_query($con,"select * from tbl_subdept where vchSdept_id='$r[vchSdept_id]'");
		$rsd=mysqli_fetch_array($sdqry);
		echo"<td>$rsd[vchSdept_name]</td>";
		echo"</tr>";
	}	
?>
</table>
<br>
<input type="submit" value="Export to excel" name="btnxcl" class="b">

<input type="submit" value="Back" name="btnback" class="b">
</center>
</form>

</div>
<?php
	if(isset($_POST['btnxcl']))
	{
		// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=Employeereport.xls");
 
// Add data table
include 'EmployeeReport.php';

	}
?>
<?php
if(isset($_POST['btnback']))
	{
		echo "<script>window.location.href='../Admin/home.php';</script>";
	}

?>