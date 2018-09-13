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
<title>SOW Details</title>

</head>
<body>
<center>
<br/><br/><br><br>
<h2>SOW Detail</h2>
<form method="get">
<?php
$qry=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_GET[sowid]' ");
$row=mysqli_fetch_array($qry);

$qry1=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row[istatus_id]' ");
$row1=mysqli_fetch_array($qry1);
?>
<table class="t3">
<tr>
<th>SOW Id</th><th>Project Name</th><th>Customer Name</th><th>SOW Start Date</th><th>SOW End Date</th><th>SOW Status</th><th>Remaining Days</th>
</tr>
<tr>
<td><?php echo $row['vchproject_id']; ?></td>
<td><?php echo $row['vchproject_name']; ?></td>
<td><?php echo $row['vchclient_name']; ?></td>
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
$q1="select * FROM tbl_resource_allocation where vchproject_id='$_GET[sowid]' AND allocated_emp_id!='' AND bsowreq!='0' ";  		
	$result1=mysqli_query($con,$q1);
if(mysqli_num_rows($result1)>0)
{
?>
<table class="t3">
<caption><h2>Served Request</h2></caption>
<tr>
<th>Employee Id</th><th>Employee Name</th><th>Designation</th><th>Start Date</th><th>End Date</th><th>Billing Type</th><th>Remaining Days</th>
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
<td><?php $current= time();
$date=strtotime($row1['dresource_enddate']);
$datediff= $date-$current;
$difference=floor($datediff/(60*60*24)) ;
if($difference<=5)
{
	echo "<p style='background-color:red;width:80px;  text-align:center;'>" . $difference. "</p>";
}
else if($difference>5 && $difference<=15)
{
	echo "<p style='background-color:#ffbf00;width:80px;  text-align:center;'>" . $difference. "</p>";
}
else 
{
	echo "<p style='background-color:green;width:80px;  text-align:center;'>" . $difference. "</p>";
}  ?></td>
</tr>
<?php

	}
echo "</table>";
}
?>

<br/><br/>

<?php
$q1="select * FROM tbl_resource_allocation where vchproject_id='$_GET[sowid]' AND allocated_emp_id='' AND bsowreq!='0'  AND bsaved_status='1' ";  		
	$result1=mysqli_query($con,$q1) or die (mysqli_error($con));
if(mysqli_num_rows($result1)>0)
{
?>
<table class="t2">
<caption><h2>Remaining Request</h2></caption>
<tr>
<th>Designation</th><th>Start Date</th><th>End Date</th><th>Billing Type</th><th>Action</th>
</tr>
<?php
	
	while ($row1 = mysqli_fetch_array($result1))
	{     
		// here too, you put a space between it
		
		$q3=mysqli_query($con,"select * FROM tbl_designation where vchdesignation_id='$row1[vchdesignation_id]'");
		$row3=mysqli_fetch_array($q3);
?>
<tr>
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
<?php echo "<a href='edit.php?srid=$row1[Srno]'><img src='../icons/edit.png' class='ig' title='Edit' name='update'></a>
&nbsp;" ; ?>
<a href='sow_detail.php?srid1=<?php echo $row1[Srno]; ?>' onClick="return confirm('Are u sure you want to delete?');" ><img src='../icons/remove.png' class='ig' title='Delete' name='delete'></a> 
</td>
</tr>
<?php

	}
echo "</table>";
}



if(isset($_GET['srid1']))
{
                $del=mysqli_query($con,"delete from tbl_resource_allocation where Srno='$_GET[srid1]' ");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Resource Request Detail is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='sow.php';</script>";
		}
}
?>

<br/><br/>
<a href=sow.php><input type='button' class='button' value='Back'></a>
</center>
</div>
</body>
</html>


