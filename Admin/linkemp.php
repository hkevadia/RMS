<head>
<style>

.t3
{
	
    display:block;

}
th
{
width:25%;
	text-align:left;
white-space:nowrap;
}
td{
	width:25%;
	text-align:left;
white-space:nowrap;
}
thead {
    display: inline-block;
    width: 100%;
    height: 20px;
}
tbody {
	margin-top:10px;
    height: 400px;
    display: inline-block;
    width: 100%;
    overflow: auto;
}


.t3 td:nth-child(4)
{
padding-right:40px;
  text-align:left;
  width:1%;
}
.t3 th:nth-child(4)
{
    padding-right:50px;
      width:1%;
}
.t3 td:nth-child(5)
{
  text-align: center;
padding-left:40px;
  
}
.t3 th:nth-child(5)
{
     text-align: center;
     padding-left:10px;

}


</style>
</head>

<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";

echo '<div class="font">';

require_once "database.php";

if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}
$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[adminid]' ");
$r=mysqli_fetch_array($q);

?>

<div class="font">
<form method="post">
<center>
	<?php
echo "<br><br><br><h2>List of Employees</h2>";
	$qry=mysqli_query($con,"select * from tbl_emp where vchemp_id!='$_SESSION[adminid]' and bemp_status!='0' order by vchemp_Fname asc");
	if($qry)
	{
if(mysqli_num_rows($qry)>0)
{

		echo "<table class='t3'>";
		
		echo "<thead><tr style='font-size:15px;'><th>Employee ID</th><th>Name</th><th>Designation</th><th>Current Project</th><th align='left'>Action</th></tr></thead><tbody>";
		while($row=mysqli_fetch_array($qry))
		{
			
			
			echo "<tr>";
			echo "<td><a href='emp_detail.php?demp=$row[vchemp_id]' style='color:Blue; text-decoration: underline;'>$row[vchemp_id]</a></td>";
			echo "<td>$row[vchemp_Fname]  $row[vchemp_Mname]  $row[vchemp_Lname]</td>";
			$qrydes=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$row[vchdesignation_id]' ");
			$rdes=mysqli_fetch_array($qrydes);
			echo "<td>$rdes[vchdesignation_name]</td>";
			$q=mysqli_query($con,"select * from tbl_resource_allocation where allocated_emp_id='$row[vchemp_id]' and dresource_enddate IN (select MAX(dresource_enddate) from tbl_resource_allocation where allocated_emp_id='$row[vchemp_id]')");
			if($r=mysqli_fetch_array($q))
			{
				$q1=mysqli_query($con,"select * from tbl_sow where vchproject_id='$r[vchproject_id]' ");
				$r1=mysqli_fetch_array($q1);
				echo "<td>$r1[vchproject_name]</td>";
			}
			else
			{
				echo "<td>Bench</td>";
				//echo "<td><a href='emp_detail.php?demp=$row[vchemp_id]'><input type='button' class='button' name='btndet' value='VIEW'></a></td>";
				//echo "</tr>";
			}
			echo "<td><a href='resupdt.php?demp=$row[vchemp_id]' style='color:Blue; text-decoration: underline;'><img src='../icons/edit.png'  class = 'ig' title='Update' name='update' ></a> &nbsp;&nbsp;&nbsp;";
			echo "<a href='resdisable.php?demp=$row[vchemp_id]' style='color:Blue; text-decoration: underline;'><img src='../icons/cc.png'  class = 'ig' title='Disable' name='Unavailable'></a></td>";
				echo "</tr>";
			
		}
		echo "</tbody></table>";
}
else
{
echo "<p class='error'>NO employees details</p>";
}
	}
	?>
</center>
</form>
</div>