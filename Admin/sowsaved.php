<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";
include("database.php");
$status=1;
?>
<?php
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}
?>


<br><br>
<center>
<h2 style="font-family:sans serif";> Saved Requests</h2>
<form method="post" onsubmit="ShowLoading()">
<table>
<tr style="background-color:transparent; ">

<td>
<?php 
$query=mysqli_query($con,"SELECT vchproject_id, vchproject_name FROM  tbl_sow WHERE vchph='$_SESSION[adminid]' order by vchproject_name ");

echo "<select name='selrequested_res'  class='textbox' style='background-color:none'><option value=''>Select Project</option>";
if($query)
	{
		while($row1=mysqli_fetch_array($query))
		{	
			echo "<option value=" . $row1['vchproject_id']." > ". $row1['vchproject_id']." | ".$row1['vchproject_name'] . "</option>";
		}
	}
	?>
</select>
</td>

<td colspan='2' align="center"><input type="submit" name="ok" value="OK" class="button"></td>
</tr>
</table>
</form>
<br><br>
<?php
if(isset($_POST['ok']) && $_POST['selrequested_res']!='')
{
	
	$qry=mysqli_query($con,"select * from tbl_resource_allocation where vchproject_id='$_POST[selrequested_res]' and allocated_emp_id='' and bsaved_status='0' and bsowreq='1'");
echo "<form method='post' onsubmit=ShowLoading()>";
	if(mysqli_num_rows($qry)>0)
	{ 
	
		$status=0;
		
		$proj=mysqli_query($con,"select vchproject_id,vchproject_name from tbl_sow where vchproject_id='$_POST[selrequested_res]'");
		if($proj)
		{
				while($pro=mysqli_fetch_array($proj))
				{
					echo "<h3><strong><tr><td>Project ID:  ".$pro['vchproject_id']."</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<td>Project Name:  ".$pro['vchproject_name']."</td></tr></strong></h3>";
					$pnm=$pro['vchproject_name'];
				}
				
		}
		
		echo "<table class='t3'>";
		echo "<tr><th>Designation</th><th>Start date</th><th>End Date</th><th>Allocation Required</th><th>Billing Type</th><th>Action</th></tr>";
		while($row=mysqli_fetch_array($qry))
		{
			echo "<tr>";
			$_SESSION['desg']=$row['vchdesignation_id'];
			//$_SESSION['rcnt']=mysqli_field_tell($qry);
			?>
			<td>
			<?php $des=mysqli_query($con,"select vchdesignation_name from tbl_designation where vchdesignation_id='$row[vchdesignation_id]'");
			if($des)
			{
				while($des1=mysqli_fetch_array($des))
				{
					echo $des1['vchdesignation_name'];
				}
			}
			echo "</td>";
			echo "<td>$row[dresource_startdate]</td>";
			echo "<td>$row[dresource_enddate]</td>";
			echo "<td>$row[fper_allocation_req]</td>";
			echo "<td>";
			if($row['b_bill_status']==1)
			{
				echo "Billable";
			}
			else
			{
				if($row['bnonbill_status']==0)
				{
					echo "ANBI";
				}
				elseif($row['bnonbill_status']==1)
				{
					echo "ANBC";
				}
				else
				{
					echo "Nonbillable";
				}
			}
			
			echo "</td>";
			
			//else{ echo mysqli_error($con); }
			echo "<td><a href='edit1.php?srid=$row[Srno]'><img src='../icons/edit.png' title='Edit' class='ig'>&nbsp;&nbsp;</a><a href='sowsaved.php?srno=$row[Srno]'><img src='../icons/sub1.ico' title='Submit' class='ig'>&nbsp;&nbsp;</a><a href='sowsaved.php?srno1=$row[Srno]'><img src='../icons/remove.png' class='ig' title='Delete'></a></td>";
		}
	}
	else
	{
		if($status==1)
		{
			echo "<script type='text/javascript'>";
			echo "alert('No requests for this project....')";
			echo "</script>";
			echo "<script>window.location.href='sowsaved.php';</script>";
		}
	}
	echo "</table></form>";
}
?>
<?php

 if(isset($_GET['srno']))
 {
	 $qupdt=mysqli_query($con,"update tbl_resource_allocation set bsaved_status='1' where Srno='$_GET[srno]'");
	 if($qupdt)
	 {
		echo "<script type='text/javascript'>";
		echo "alert('Resource Request Submitted....')";
		echo "</script>";
		echo "<script>window.location.href='sowsaved.php';</script>";
	 }
 }
 
  if(isset($_GET['srno1']))
 {
	 $qupdt1=mysqli_query($con,"delete from tbl_resource_allocation where Srno='$_GET[srno1]'");
	 if($qupdt1)
	 {
		echo "<script type='text/javascript'>";
		echo "alert('Resource Request Cancelled....')";
		echo "</script>";
		echo "<script>window.location.href='sowsaved.php';</script>";
	 }
 }
?>
