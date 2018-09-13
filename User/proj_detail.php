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

<!DOCTYPE html>
<html>
<head>
<br><br><br><br><br>
<title>Project Details</title>

</head>
<body>
<center>

<h2>Project Detail</h2>
<form method="get">
<?php
$qry=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_GET[projid]' ");
$row=mysqli_fetch_array($qry);

$qry1=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row[istatus_id]' ");
$row1=mysqli_fetch_array($qry1);
?>
<table class="t3">
<tr>
<th>Project Id</th><th>Project Name</th><th>Start Date</th><th>End Date</th><th>SOW Status</th><th>Remaining Days</th>
</tr>
<tr>
<td><?php echo $row['vchproject_id']; ?></td>
<td><?php echo $row['vchproject_name']; ?></td>
<td><?php 
$dsow_startDate=date("d-m-Y", strtotime($row['dsow_startDate']));
$dsow_endDate=date("d-m-Y", strtotime($row['dsow_endDate']));
echo $dsow_startDate; ?></td>
<td><?php echo $dsow_endDate; ?></td>
<td><?php echo $row1['vchstatus_nm']; ?></td>
<td>
<?php 
$current= time();
$date=strtotime($row['dsow_endDate']);
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
?>
</td>
</tr>
</table>
<br/><br/>
<?php
$q1="select * FROM tbl_resource_allocation where vchproject_id='$_GET[projid]' AND allocated_emp_id!='' ";  		
	$result1=mysqli_query($con,$q1);
	if(mysqli_num_rows($result1)>0)
{
?>
<table class="t3">
<tr>
<th>Employee Id</th><th>Employee Name</th><th>Designation</th><th>Start Date</th><th>End Date</th><th>Billing Type</th><th>Allocation Type</th><th>Remaining Days</th>
</tr>
<?php
	while ($row1 = mysqli_fetch_array($result1))
	{     
		// here too, you put a space between it
		$q2=mysqli_query($con,"select * FROM tbl_emp where vchemp_id='$row1[allocated_emp_id]'");
		$row2=mysqli_fetch_array($q2);
		
		$q3=mysqli_query($con,"select * FROM tbl_designation where vchdesignation_id='$row1[vchdesignation_id]'");
		$row3=mysqli_fetch_array($q3);
?>
<tr>
<td><?php echo $row1['allocated_emp_id']; ?></td>
<td><?php echo $row2['vchemp_Fname'].' '.$row2['vchemp_Lname']; ?></td>
<td><?php echo $row3['vchdesignation_name']; ?></td>
<td style="width:110px;"><?php
$dresource_startdate=date("d-m-Y", strtotime($row1['dresource_startdate']));
$dresource_enddate=date("d-m-Y", strtotime($row1['dresource_enddate']));
 echo $dresource_startdate; ?></td>
<td style="width:110px;"><?php echo $dresource_enddate; ?></td>
<td>
<?php
if($row1['b_bill_status']==1)
{
	echo "Billable";
}
else
{
	if($row1['bnonbill_status']==0)
	{
		echo "ANBI";
	}
	elseif($row1['bnonbill_status']==1)
	{
		echo "ANBC";
	}
	else
	{
		echo "Nonbillable";
	}
}
?>
</td>
<td>
<?php
if($row1['req_from']=='')
{
	echo "Shadow";
}
elseif($row1['bsowreq']==1)
{
	echo "SOW";
}
elseif($row1['bsowreq']==0)
{
	echo "Additional";
}
?>
</td>
<td><?php $current= time();
$date=strtotime($row1['dresource_enddate']);
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
}  ?></td>
</tr>
<?php

	}
echo "</table>";
}
else
{
echo "<p class='error'>No employee has been assigned to this project</p>";
}
?>
<br/><br/>
<a href="home.php"><input type="button" class="button" value="Back"></a>
</center>
<?php 

?>
</div>
</body>
</html>


