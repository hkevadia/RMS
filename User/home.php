<?php
session_start();

require_once "database.php";
error_reporting(E_ERROR | E_PARSE); 
if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}
$q=mysqli_query($con,"select vchemp_id from tbl_practicehead where vchemp_id='$_SESSION[userid]' ");
if(mysqli_fetch_array($q))
{
	include "../header_ph.php";
}
else
{

include "../header_pm.php";	

}


echo '<div class="font">';
$q1=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[userid]' ");
$r1=mysqli_fetch_array($q);
?>
<body>


</body>

<!DOCTYPE html>
<html>
<body>

<center>
<br><br><br><br><br>
<h2>List of Projects</h2>

<form method="post">
<table class="t3">

<?php 
require_once "database.php"; 

$q="select DISTINCT vchph from tbl_sow where vchph='$_SESSION[userid]'";
$res=mysqli_query($con,$q);

if(mysqli_fetch_array($res) > 0)
{
echo "<tr><th>Project Name</th><th>Project Manager</th><th>Start Date</th><th>End Date</th><th>SOW Status</th><th>Remaining Days</th><th>Action</th></tr>";
	$qry="select * from tbl_sow where vchph='$_SESSION[userid]' AND bproj_status!='0' OR vchdept_id=(select vchdept_id from tbl_practicehead where vchemp_id='$_SESSION[userid]') ";
	$result=mysqli_query($con,$qry);

	if($result)
	{
		while($row1=mysqli_fetch_array($result))
		{	
			$q=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row1[istatus_id]' ");
			$r=mysqli_fetch_array($q);
			
			echo "<tr><td><a href='proj_detail.php?projid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'>".$row1['vchproject_name']."</a></td>";
			$qpm=mysqli_query($con,"Select * from tbl_emp where vchemp_id='$row1[vchpm]'");
			$rpm=mysqli_fetch_array($qpm);
			
			echo "<td>".$rpm['vchemp_Fname']." ".$rpm['vchemp_Lname']."</td>";
$dsow_startDate=date("d-m-Y", strtotime($row1['dsow_startDate']));
$dsow_endDate=date("d-m-Y", strtotime($row1['dsow_endDate']));
			echo "<td>".$dsow_startDate."</td><td>".$dsow_endDate."</td>";
			echo "<td>".$r['vchstatus_nm']."</td><td>";
			$current= time();
			$date=strtotime($row1['dsow_endDate']);
			$datediff= $date-$current;
			$difference=floor($datediff/(60*60*24)) ;
			if($difference<=5)
			{
				echo "<p style='background-color:red;width:80px; text-align:center;'>" . $difference. "</p>";
			}
			else if($difference>5 && $difference<=15)
			{
				echo "<p style='background-color:#ffbf00;width:80px; text-align:center;'>" . $difference. "</p>";
			}
			else 
			{
				echo "<p style='background-color:green;width:80px; text-align:center;'>" . $difference. "</p>";
			}
			echo "</td><td><a href='projdisable.php?projid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'><img src='../icons/cc.png'  class = 'ig' title='Disable' name='Disable'></a></td></tr>";
			echo "</tr>";
		}
	}
	echo "</table><br/><br/>";

}
else
{	
$qry="select * from tbl_sow where vchpm='$_SESSION[userid]' AND bproj_status!='0' ";
	$result=mysqli_query($con,$qry);
if(mysqli_fetch_array($result) > 0)
{
echo "<tr><th>Project Name</th><th>Start Date</th><th>End Date</th><th>SOW Status</th><th>Remaining Days</th></tr>";
	$qry1="select * from tbl_sow where vchpm='$_SESSION[userid]' AND bproj_status!='0'";
	$result1=mysqli_query($con,$qry1);

	if($result1)
	{
		while($row1=mysqli_fetch_array($result1))
		{	
	
			$q=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row1[istatus_id]' ");
			$r=mysqli_fetch_array($q);
			
			echo "<tr><td><a href='proj_detail.php?projid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'>".$row1['vchproject_name']."</a></td>";
			$qpm=mysqli_query($con,"Select * from tbl_emp where vchemp_id='$row1[vchpm]'");
			$rpm=mysqli_fetch_array($qpm);
			
			//echo "<td>".$rpm['vchemp_Fname']." ".$rpm['vchemp_Lname']."</td>";
$dsow_startDate=date("d-m-Y", strtotime($row1['dsow_startDate']));
$dsow_endDate=date("d-m-Y", strtotime($row1['dsow_endDate']));
			echo "<td>".$dsow_startDate."</td><td>".$dsow_endDate."</td>";
			echo "<td>".$r['vchstatus_nm']."</td><td>";
			$current= time();
			$date=strtotime($row1['dsow_endDate']);
			$datediff= $date-$current;
			$difference=floor($datediff/(60*60*24)) ;
			if($difference<=5)
			{
				echo "<p style='background-color:red;width:80px; text-align:center;'>" . $difference. "</p>";
			}
			else if($difference>5 && $difference<=15)
			{
				echo "<p style='background-color:#ffbf00;width:80px; text-align:center;'>" . $difference. "</p>";
			}
			else 
			{
				echo "<p style='background-color:green;width:80px; text-align:center;'>" . $difference. "</p>";
			}
			//echo "</td><td><a href='projdisable.php?projid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'><img src='../icons/cc.png'  class = 'ig' title='Disable' name='Disable'></a></td></tr>";
		}
		echo "</table><br/><br/>";
	}
}
else
{
 echo "<h1 class='error' style='font-size:20px;'>No Records for you....</h1>";
}
}
	?>


</form>
<br/><br/><br/>
</center>
</body>

</html>
		