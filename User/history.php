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
		
				$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_GET[xemp]'");
	$r=mysqli_fetch_array($q);
		echo "<br><br><br>";
		echo "<h2>$r[vchemp_Fname]  $r[vchemp_Lname]</h2>";
	?>
	
<?php

	if(isset($_GET['xemp']))
	{
		$qry=mysqli_query($con,"select vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate from tbl_resource_allocation where allocated_emp_id='$_SESSION[zemp]' and dresource_enddate IN (select MAX(dresource_enddate) from tbl_resource_allocation where allocated_emp_id='$_SESSION[zemp]')");
		if($qry)
		{
			echo "<table border=1 class= 't2'>";
			echo "<h2>Employee Current Details</h2>";
			//echo "<tr><td>$_SESSION[zemp]</td></tr>";
			echo "<tr><th>Project Name</th><th>Designation ID</th><th>Start date</th><th>End Date</th><th>RAG</th></tr>";
			while($row1=mysqli_fetch_array($qry))
			{
				echo "<tr>";
$pnm=mysqli_query($con,"select * from tbl_sow where vchproject_id='$row1[vchproject_id]'");
$rpnm=mysqli_fetch_array($pnm);
				echo "<td>$rpnm[vchproject_name]</td>";
				echo "<td>$row1[vchdesignation_id]</td>";
$dresource_startdate=date("d-m-Y", strtotime($row1['dresource_startdate']));
$dresource_enddate=date("d-m-Y", strtotime($row1['dresource_enddate']));
				echo "<td>$dresource_startdate</td>";
				echo "<td>$dresource_enddate</td><td>";
				//echo "<td>$row1[vchproject_id]</td>";
				$current= time();
				$date=strtotime($row1['dresource_enddate']);
				$datediff= $date-$current;
				$difference=floor($datediff/(60*60*24)) ;
				if($difference<=5)
				{
					echo "<p style='background-color:red;width:80px;'>" . $difference. "</p>";
				}
				else if($difference>5 && $difference<=15)
				{
					echo "<p style='background-color:#ffbf00;width:80px;'>" . $difference. "</p>";
				}
				else 
				{
					echo "<p style='background-color:green;width:80px;'>" . $difference. "</p>";
				} 
				echo "</td></tr>";
			}
			echo "</table>";
			//echo "<a href=emp_detail.php?xemp=$_SESSION[zemp]><input type='button' class='button' name=btn value='HISTORY'></a>";
		}
		else{
			echo mysqli_error($con);
		}

		$sqry=mysqli_query($con,"select * from tbl_resource_allocation where allocated_emp_id='$_GET[xemp]' order by dresource_enddate desc");
		if($sqry)
		{
			echo "<table border=1 class='t3'>";
			echo "<h2>Employee History</h2>";
			echo "<tr><th>Project Name</th><th>Designation ID</th><th>Start date</th><th>End Date</th></tr>";
			while($row=mysqli_fetch_array($sqry))
			{
				echo "<tr>";
				//echo "<td>$row[Srno]</td>";
$pnm=mysqli_query($con,"select * from tbl_sow where vchproject_id='$row[vchproject_id]'");
$rpnm=mysqli_fetch_array($pnm);
				echo "<td>$rpnm[vchproject_name]</td>";
				echo "<td>$row[vchdesignation_id]</td>";
$dresource_startdate=date("d-m-Y", strtotime($row['dresource_startdate']));
$dresource_enddate=date("d-m-Y", strtotime($row['dresource_enddate']));
				echo "<td>$dresource_startdate</td>";
				echo "<td>$dresource_enddate</td>";
				echo "</tr>";
			}
			echo "</table>";

		}
    }

?>

</form>
</center>
</div>