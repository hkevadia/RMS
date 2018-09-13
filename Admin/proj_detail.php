<?php
session_start();

require_once "database.php";
error_reporting(E_ERROR | E_PARSE); 
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}
include "../header.php";

$_SESSION['projid1']=$_GET['projid'];
echo '<div class="font">';

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dpxyz" ).datepicker({ dateFormat: "dd-mm-yy" });
            $( "#dpxyz" ).datepicker("show");
         });

function suba()
{
alert("sdfds");
document.getElementById('form1').submit();
alert("fo");
}
      </script>
<script>
    var submit = $('form').find('input[type=submit]');
    submit.hide();
    submit.after('<input type=image src=../icons/edit.png />');
</script>
<style>
.lg { text-indent:-9999em; border:0; width:24px;height:24px;  line-height:0 font-size:0; }
</style>
<!DOCTYPE html>
<html>
<head>
<title>Project Details</title>

</head>
<body>
<center>
<br><br><br>
<h2>Project Detail</h2>

<?php
$qry=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_SESSION[projid1]' ");
$row=mysqli_fetch_array($qry);

$qry1=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row[istatus_id]' ");
$row1=mysqli_fetch_array($qry1);
?>
<table class="t3">
<tr>
<th>Project Name</th><th>Start Date</th><th>End Date</th><th>SOW Status</th><th>Remaining Days</th>
</tr>
<tr>
<td><?php echo $row['vchproject_name']; ?></td>
<td><?php
$dsow_startDate=date("d-m-Y", strtotime($row['dsow_startDate']));
 echo $dsow_startDate; ?></td>
<td><?php
$dsow_endDate=date("d-m-Y", strtotime($row['dsow_endDate']));
echo $dsow_endDate; ?></td>
<td><?php 
$qsow=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row1[istatus_id]'");
$rsow=mysqli_fetch_array($qsow);
echo $rsow['vchstatus_nm']; ?></td>
<td>
<?php 
/* date_default_timezone_set('Asia/Kolkata');
 $current=date("Y-m-d G:i:s");
 $current=date("Y-m-d");
$enddate=$row['dsow_endDate'];
 $diff=$enddate-$current;
 $diff=date_diff($current,$enddate);
 $diff=date_diff($enddate,$current);
$enddate-$current;
*/
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
<form method="POST" id='form1'>
<h2>Allocated Employees</h2>
<table class="t3">

<?php
	$q1="select * FROM tbl_resource_allocation where vchproject_id='$_SESSION[projid1]' AND allocated_emp_id!='' ";  		
	$result1=mysqli_query($con,$q1) or die (mysqli_error($con));
if(mysqli_num_rows($result1)>0)
{ ?>
<tr>
<th>Employee Id</th><th>Employee Name</th><th>Designation</th><th>Start Date</th><th>End Date</th><th>Billing Type</th><th>Allocation Type</th><th>Remaining Days</th><th>Action</th>
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
 echo $dresource_startdate; ?></td>
<td style="width:110px;"><?php
$dresource_enddate=date("d-m-Y", strtotime($row1['dresource_enddate']));
$qsrno=mysqli_query($con,"select * from tbl_resource_allocation where Srno='$_GET[srnoid]'");
if($qsrno)
{
if(isset($_GET['srnoid']) && $_GET['srnoid']==$row1['Srno'])
{
echo "<input type='text' name='txtdisres' id='dpxyz' value='Deallocation Date'></form>";
}
else
{
echo $dresource_enddate; 
}
}
else
{
echo $dresource_enddate; 
}
 ?></td>
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
<td>
<?php
$qsrno=mysqli_query($con,"select * from tbl_resource_allocation where Srno='$_GET[srnoid]'");
if($qsrno)
{
if(isset($_GET['srnoid']) && $_GET['srnoid']==$row1['Srno'])
{
$_SESSION['srnoid12']=$_GET['srnoid'];
?>
<!--<a href='proj_detail.php?srnoid1=<?php echo $row1['Srno'];?>&projid=<?php echo $_SESSION['projid1'];?>' onclick="suba();"><img src='../icons/edit.png' style:'margin-left:50px;' class = 'ig' title='Update Resource' name='Update'></a>-->
<input type="submit" value="updt" name="srnoid1" class="lg" title="Deallocate Resource">
<?php
}
else
{
?>
<a href='proj_detail.php?srnoid=<?php echo $row1['Srno'];?>&projid=<?php echo $_SESSION['projid1'];?>'><img src='../icons/cc.png' style:'margin-left:50px;' class = 'ig' title='Disable Resource' name='Disable'></a>
<?php
}
}
else
{
?>
<a href='proj_detail.php?srnoid=<?php echo $row1['Srno'];?>&projid=<?php echo $_SESSION['projid1'];?>'><img src='../icons/cc.png' style:'margin-left:50px;' class = 'ig' title='Disable Resource' name='Disable'></a>

<?php
}
 ?>
</td>
</tr>
<?php

	}
}
else
{
echo "<p class='error'> No employee has been assigned to this porject</p>";
}
?>
</table>
<br/><br/>
<a href="home.php"><input type="button" class="button" value="Back"></a>
</center>
<?php 

?>
</div>
</body>
</html>

<?php
if(isset($_POST['srnoid1']))
{
//echo "text ". $_POST['txtdisres'];
   $date1 = $_POST['txtdisres'];
    $dd1=date_create($date1);
  $end_date=date_format($dd1,"Y-m-d");
$qupdt=mysqli_query($con,"update tbl_resource_allocation set dresource_enddate='$end_date' where Srno='$_SESSION[srnoid12]'");
if($qupdt)
{
//echo "updated!!";
echo "<script>window.location.href='proj_detail.php?projid=" . $_SESSION['projid1'] . "'</script>";
}
}

?>

		