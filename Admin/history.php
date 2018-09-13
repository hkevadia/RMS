<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";
require "database.php";
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}
?>

<div class="font">
<form method="post">
<center>
<br><br><br>
<?php
			$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_GET[xemp]'");
	$r=mysqli_fetch_array($q);
		echo "<h2>$r[vchemp_Fname] $r[vchemp_Lname]</h2>";
	?>
	
<?php

	if(isset($_GET['xemp']))
	{
		$qry=mysqli_query($con,"select vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate from tbl_resource_allocation where allocated_emp_id='$_SESSION[zemp]' AND dresource_enddate IN (select MAX(dresource_enddate) from tbl_resource_allocation where allocated_emp_id='$_SESSION[zemp]')");
		if(mysqli_num_rows($qry)>0)
		{
			echo "<table class='t3'>";
			echo "<h3>Employee Current Details</h3>";
			//echo "<tr><td>$_SESSION[zemp]</td></tr>";
			echo "<tr><th>Project Name</th><th>Designation</th><th>Start date</th><th>End Date</th><th>Elapse Days</th></tr>";
			while($row1=mysqli_fetch_array($qry))
			{
				echo "<tr>";
$pnm=mysqli_query($con,"select * from tbl_sow where vchproject_id='$row1[vchproject_id]'");
$rpnm=mysqli_fetch_array($pnm);
				echo "<td>$rpnm[vchproject_name]</td>";

				$qrydes=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$row1[vchdesignation_id]' ");
			$rdes=mysqli_fetch_array($qrydes);
			echo "<td>$rdes[vchdesignation_name]</td>";
$dresource_startdate=date("d-m-Y", strtotime($dresource_startdate));
$dresource_enddate=date("d-m-Y", strtotime($dresource_enddate));
				echo "<td>$dresource_startdate</td>";
				echo "<td>$dresource_enddate</td><td>";
				//echo "<td>$row1[vchproject_id]</td>";
				$current= time();
				$date=strtotime($row1['dresource_enddate']);
				$datediff= $date-$current;
				$difference=floor($datediff/(60*60*24)) ;
				if($difference<=5)
				{
					echo "<p style='background-color:red;width:80px;text-align:center;'>" . $difference. "</p>";
				}
				else if($difference>5 && $difference<=15)
				{
					echo "<p style='background-color:#ffbf00;width:80px;text-align:center;'>" . $difference. "</p>";
				}
				else 
				{
					echo "<p style='background-color:green;width:80px;text-align:center;'>" . $difference. "</p>";
				} 
				echo "</td></tr>";
			}
			echo "</table>";
		}
		else{
			echo "<p class='error'>No current record for this employee.</p>";
		}

		$sqry=mysqli_query($con,"select * from tbl_resource_allocation where allocated_emp_id='$_GET[xemp]' order by dresource_enddate desc");
		if(mysqli_num_rows($sqry)>0)
		{
			echo "<table class='t3'>";
			echo "<h3>Employee History</h3>";
			echo "<tr><th>Project Name</th><th>Designation</th><th>Start date</th><th>End Date</th></tr>";
			while($row=mysqli_fetch_array($sqry))
			{
				echo "<tr>";
$pnm=mysqli_query($con,"select * from tbl_sow where vchproject_id='$row[vchproject_id]'");
$rpnm=mysqli_fetch_array($pnm);
				echo "<td>$rpnm[vchproject_name]</td>";
				$qrydes=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$row[vchdesignation_id]' ");
			$rdes=mysqli_fetch_array($qrydes);
			echo "<td>$rdes[vchdesignation_name]</td>";
$dresource_startdate=date("d-m-Y", strtotime($dresource_startdate));
$dresource_enddate=date("d-m-Y", strtotime($dresource_enddate));
				echo "<td>$dresource_startdate</td>";
				echo "<td>$dresource_enddate</td>";
				echo "</tr>";
			}
			echo "</table>";

		}
else
{
echo "<p class='error'>No history found.</p>";
}
                echo "<br/><br/><a href=linkemp.php><input type='button' class='button' value='Back'></a>";
         }

?>

</form>
</center>
</div>	