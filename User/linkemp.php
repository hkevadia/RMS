<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_ph.php";

echo '<div class="font">';

require_once "database.php";

if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}
$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[userid]' ");
$r=mysqli_fetch_array($q);

?>

<div class="font">
<form method="post">
<center>
	<?php
	$qry=mysqli_query($con,"select * from tbl_emp where vchemp_id!='$_SESSION[userid]' and bemp_status!='0' order by vchemp_Fname asc");
	if($qry)
	{
		echo "<table border=1 class='t3'>";
		echo "<caption style='margin:-5px 0 12px 0;'><h2>List of Employee</h2></caption>";
		echo "<tr><th>Employee ID</th><th>Name</th><th>Email</th><th>Current<br/>Project</th><th>Action</th></tr>";
		while($row=mysqli_fetch_array($qry))
		{
			
			
			echo "<tr>";
			echo "<td>$row[vchemp_id]</td>";
			echo "<td>$row[vchemp_Fname]  $row[vchemp_Mname]  $row[vchemp_Lname]</td>";
			echo "<td>$row[vchemail]</td>";
			$q=mysqli_query($con,"select * from tbl_resource_allocation where allocated_emp_id='$row[vchemp_id]' and dresource_enddate IN (select MAX(dresource_enddate) from tbl_resource_allocation where allocated_emp_id='$row[vchemp_id]')");
			if($r=mysqli_fetch_array($q))
			{
				$q1=mysqli_query($con,"select * from tbl_sow where vchproject_id='$r[vchproject_id]' ");
				$r1=mysqli_fetch_array($q1);
				echo "<td>$r1[vchproject_name]</td>";
				echo "<td><a href='emp_detail.php?demp=$row[vchemp_id]'><input type='button' class='button' name='btndet' value='VIEW'></a></td>";
				echo "</tr>";
			}
			else
			{
				echo "<td>Bench</td>";
				echo "<td><a href='emp_detail.php?demp=$row[vchemp_id]'><input type='button' class='button' name='btndet' value='VIEW'></a></td>";
				echo "</tr>";
			}
			
			
		}
		echo "</table>";
	}
	?>
</center>
</form>
</div>