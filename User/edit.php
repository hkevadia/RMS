<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_ph.php";
echo '<div class="font">';

require_once "database.php";

/*$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[userid]' ");
$r=mysqli_fetch_array($q);*/
?>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dpxyz" ).datepicker();
            $( "#dpxyz" ).datepicker("show");
         });
 $(function() {
            $( "#dpxyz" ).datepicker();
            $( "#dpxyz" ).datepicker("show");
         });
      </script>
<?php
if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}
$status=0;

$proj_Err = $sdate_Err = $edate_Err = $bill_per_Err = $per_allocation_Err = $emp_Err = "";
$proj = $sdate = $edate = $bill_per = $per_allocation = $emp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	/*if(empty($_POST["proj"]))
	{
		$status=1;
		$proj_Err = "Select Project";
	}
	
	
	if(empty($_POST["sdate"]))
	{
		$status=1;
		$sdate_Err = "Select Start Date";
	}
	
	if(empty($_POST["edate"]))
	{
		$status=1;
		$edate_Err = "Select End Date";
	}
	
	if (empty($_POST["bill_per"])) 
	{
		$status=1;
		$bill_per_Err = "Enter Billability Percentage";
	} 
	else 
	{
		$bill_per = test_input($_POST["bill_per"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[0-9]+$/",$bill_per))
		{
			$status=1;
			$bill_per_Err = "Only numbers are allowded"; 
		}
	}
	
	if (empty($_POST["per_allocation"])) 
	{
		$status=1;
		$per_allocation_Err = "Enter Percentage Allocation";
	} 
	else 
	{
		$per_allocation = test_input($_POST["per_allocation"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[0-9]+$/",$per_allocation))
		{
			$status=1;
			$per_allocation_Err = "Only numbers are allowded"; 
		}
	}
	
	if(empty($_POST["emp"]))
	{
		$status=1;
		$emp_Err = "Select Employee";
	}*/
	
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<script>
function rdsel()
{
	document.forms[0].submit();
}
</script>
<!DOCTYPE html>
<html>
<head>
<title>Allocate</title>
</head>
<body>
<br/><br/><br/>
<center>
<h2>Update Request</h2>
<?php
$_SESSION['srnoid']=$_GET['srid'];
$srno=mysqli_query($con,"select * from tbl_resource_allocation where Srno='$_GET[srid]' ");
$row=mysqli_fetch_array($srno);

?>
<form action="#" method="post" onsubmit="ShowLoading()">
<table align="center" border='1' class="t5">
<tr><th colspan='8' align='left'>Update Request</th></tr>
<tr>
<td>Designation</td>
<td><select name="design" class="textbox">
  <?php 
$qry=mysqli_query($con,"select * from tbl_designation order by vchdesignation_name");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchdesignation_id']; ?>" <?php if($row['vchdesignation_id']==$row1['vchdesignation_id']){echo "selected";} ?> > <?php echo $row1['vchdesignation_name']; ?> </option>
		<?php
	}
}
?>
	</select></td>

</tr>
<tr></tr><tr></tr>
<tr>
<td>Percentage Allocation</td><td><input type="text" maxlength="5" class="textbox" name="per_allocation" value="<?php echo $row['fper_allocation_req']; ?>" > </td>
</tr>
<tr></tr><tr></tr>

<!--<tr>
<td>Select One</td><td><input type="radio" name="bill_type"  value="1" <?php if(isset($_POST['bill_type']) && $_POST['bill_type']=='1'){echo "checked";} ?> onChange="rdsel();">Billable
   <input type="radio" name="bill_type" value="0" <?php if(isset($_POST['bill_type']) && $_POST['bill_type']=='0'){echo "checked";}  ?> onChange="rdsel();">Non-Billable </td>
</tr>
<tr></tr><tr></tr>-->

<tr>
<?php
if(isset($_POST['bill_type']) && $_POST['bill_type']=='1')
{
	?>
<td>Billabe</td><td><input type="text" maxlength="5" class="textbox" name="bill" value="<?php echo $row['fbillability_per']; ?>"></td>
	<?php
}
elseif(isset($_POST['bill_type']) && $_POST['bill_type']=='0')
{
	?>
	<td>Non-Billabe</td><td>
		<select name="nonbill" class='textbox'>
        <option value="">Select</option>
        <option value="ANBC">ANBC</option>
        <option value="ANBI">ANBI</option>
        <option value="NONBILL">Non-Billable</option>
       </select>
   </td>

	<?php
}
?>
</tr>
<tr></tr><tr></tr>

<tr>
<td>Start Date</td><td><input name="sdate" type="date" value="<?php echo $row['dresource_startdate']; ?>" ></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>End Date</td><td><input name="edate" type="date" value="<?php echo $row['dresource_enddate']; ?>" ></td>
</tr>

<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr>
<td align='right'><input type="submit" name="btnsub" value="Update" class="button"></td><td align='left'>&nbsp;<a href="sow.php"><input type="button"  class="button" name="btncan" value="Cancel"></a></td>
</tr>
</table>
</form>
</center>
<?php

require_once "database.php";

if(isset($_POST['btnsub']))
{	 

	$q=mysqli_query($con,"update tbl_resource_allocation set vchdesignation_id='$_POST[design]',fper_allocation_req='$_POST[per_allocation]',fbillability_per='$_POST[bill]',dresource_startdate='$_POST[sdate]',dresource_enddate='$_POST[edate]' where Srno='$_SESSION[srnoid]' ");
        if($q)
        {
                echo "<script type='text/javascript'>";
		echo "alert('Resource Request updated Successfully....')";
		echo "</script>";
                echo "<script>window.location.href='sow.php';</script>"; 
        }
        else
        {
               echo "<p class='error'>Error in Updation". mysqli_error($con) . "</p>";
        }
		/*$proj = $_POST['proj'];
		$sdate = $_POST['sdate'];
		$edate = $_POST['edate'];
		$bill_per = $_POST['bill_per'];
		$per_allocation = $_POST['per_allocation'];
		$emp = $_POST['emp'];	

		$q=mysqli_query($con,"select * from tbl_sow where vchproject_id='$proj' ");
		$r=mysqli_fetch_array($q12);
		
		$q12=mysqli_query($con,"select * from tbl_sow where vchproject_id='$proj' ");
		$r12=mysqli_fetch_array($q12);

        if($_POST["edate"] < $_POST["sdate"] )
	    {
		    echo "<script type='text/javascript'>";
			echo "alert('Select valid End Date')";
			echo "</script>";
	    }
        else if($_POST['sdate'] < $r12['dsow_startDate'])
		{
			echo "<script type='text/javascript'>";
			echo "alert('Resource Start date should be Grater than SOW Start date')";
			echo "</script>"; 
		}
		else if($_POST['edate'] > $r12['dsow_endDate'])
		{
			echo "<script type='text/javascript'>";
			echo "alert('Resource End date should be Less than SOW End date')";
			echo "</script>"; 
		}
		else
		{
			$q=mysqli_query($con,"insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$proj','','$sdate','$edate','1','$bill_per','','$per_allocation','','$emp','','')");
		}*/
}

if(isset($_POST['btncan']))
{
	echo "<script>window.location.href='sow.php';</script>";
}
?>
</div>
</body>
</html>			