<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_ph.php";

echo '<div class="font">';

require_once "database.php";
?>
<?php
if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}
$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[userid]' ");
$r=mysqli_fetch_array($q);

$status=0;

// define variables and set to empty values
$proj_idErr = $proj_nameErr = $etypeErr = $proj_mngrErr = $clnt_nameErr = $billingtypeErr = $startdateErr = $enddateErr = $acc_mngrErr = $descErr = "";
$proj_id = $proj_name = $etype = $proj_mngr = $clnt_name = $billingtype = $startdate = $enddate = $acc_mngr = $desc = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["proj_name"])) 
	{
		$status=1;
		$proj_nameErr = "Project Name is required";
	} 
	else 
	{
		$proj_name = test_input($_POST["proj_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[A-Za-z0-9 _.]+$/",$proj_name))
		{
			$status=1;
			$proj_nameErr = "Enter Valid Project Name"; 
		}
	}
	
	/*if (empty($_POST["etype"]))
	{
		$etypeErr = "Select etype";
	} 
	else 
	{
		$etype = test_input($_POST["etype"]);
	}*/
	

	
	if (empty($_POST["clnt_name"]))
	{
		$status=1;
		$clnt_nameErr = "Client Name is required";
	}
	else 
	{
		$clnt_name = test_input($_POST["clnt_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[A-Z a-z 0-9]+$/",$clnt_name))
		{
			$status=1;
			$clnt_nameErr = "Enter Valid Client Name"; 
		}
	}
	
	if(empty($_POST["billingtype"]))
	{
		$status=1;
		$billingtypeErr = "Select Billing Type";
	}
	/*else 
	{
		$billingtype = test_input($_POST["$billingtype"]);
	}*/

	if(empty($_POST["startdate"]))
	{
		$status=1;
		$startdateErr = "Select Start Date";
	}
	/*else 
	{
		$startdate = test_input($_POST["$startdate"]);
	}*/
	
	if(empty($_POST["enddate"]))
	{
		$status=1;
		$enddateErr = "Select End Date";
	}
	if($_POST["enddate"] < $_POST["startdate"])
	{
		$status=1;
		$enddateErr = "Select valid End Date";
	}
	/*else 
	{
		$enddate = test_input($_POST["$enddate"]);
	}*/
	
	if (empty($_POST["selacc"]))
	{
		$status=1;
		$acc_mngrErr = "Account Manager is required";
	}
	else 
	{
		/*$acc_mngr = test_input($_POST["acc_mngr"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[A-Z a-z ]+$/",$acc_mngr))
		{
			$status=1;
			$acc_mngrErr = "Enter Valid Account Manager"; 
		}*/
	}
	
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<body>
<br/><br/><br/><br/>
<center>
<h2>Update SOW</h2>
<!--
<form method="get" onsubmit="ShowLoading()">
<table>

<tr><td>Select Project</td> 
<td>
<select name="updateproj_id"  class="textbox"><option value="">
  <?php 
/*$qry=mysqli_query($con,"select * from tbl_sow where bproj_status!='0'");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchproject_id']; ?>" <?php if(isset($_GET['updateproj_id'])){if($_GET['updateproj_id']==$row1['vchproject_id']){echo "selected";}} ?> > <?php echo $row1['vchproject_id'].' | '.$row1['vchproject_name']; ?> </option>
		<?php
	}
}*/
?>
</select>
</td>
<td><input type="submit" name="btnedit" value="Ok"  class="button"></td>
<td><input name="cancel" type="button"  value="Cancel" onclick="location.href='sow_pgupdate.php'"  class="button"></td>
</tr>
</table>
</form>
</center>
</body>
</html>-->
<?php

if(isset($_GET['sowid'])){ 

	$selqry=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_GET[sowid]'");
	if($selqry)
	{
		while($row=mysqli_fetch_array($selqry))
		{
?>

<center>

<form method="post" onsubmit="ShowLoading()">
<table border="1" class="t5">
<tr><th colspan='8' align='left'>SOW Details</th></tr>
<tr>
	<td>SOW Id&nbsp;&nbsp;&nbsp;</td><td><input name="proj_id" type="text"  class="textbox" readonly value="<?php echo $row['vchproject_id'];
?>" placeholder="Project Id" readonly> <span class="error">* <?php echo $proj_idErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Project Name</td><td><input name="proj_name" type="text"  class="textbox" value="<?php echo $row['vchproject_name']; ?>" placeholder="Project Name"> <span class="error">* <?php echo $proj_nameErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Customer Name</td><td><input name="clnt_name"  class="textbox" type="text" value="<?php echo $row['vchclient_name']; ?>" placeholder="Client name"> <span class="error">* <?php echo $clnt_nameErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>SOW Start date</td>
<td>
<!--<input name="startdate" type="text" value="<?php //if(isset($_POST['startdate'])) { echo $_POST['startdate']; } ?>" id="startdate">--> 
<input name="startdate" type="date" class="textbox"
 value="<?php echo $row['dsow_startDate']; ?>" ><span class="error">* <?php echo $startdateErr;?></span>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>SOW End date</td>
<td>
<!--<input name="enddate" type="text" value="<?php //if(isset($_POST['enddate'])) { echo $_POST['enddate']; } ?>" id="enddate">-->
<input name="enddate" type="date" class="textbox"
 value="<?php echo $row['dsow_endDate']; ?>" > <span class="error">* <?php echo $enddateErr;?></span>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Account Manager</td><td>
<?php
	$aqry=mysqli_query($con,"select vchemp_id,vchemp_Fname,vchemp_Lname from tbl_emp where vchdesignation_id=(select vchdesignation_id from tbl_designation where vchdesignation_name='Acc_manager') order by vchemp_Fname");
	if($aqry)
	{
		echo "<select name='selacc' class='textbox'><option value=''>Select value</option>";
		while($ac=mysqli_fetch_array($aqry))
		{ ?>
			<option value="<?php echo $ac['vchemp_id']; ?>" <?php if($row['vchacc_manager']==$ac['vchemp_id']){echo "selected";} ?> > <?php echo $ac['vchemp_id'] . " | " . $ac['vchemp_Fname'] . " " . $ac['vchemp_Lname']; ?> </option>
		
		<?php }
		echo "</select>";
	}
	
?>
 <span class="error">* <?php echo $acc_mngrErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Billing Type</td>
<td><select name="billingtype"  class="textbox"><option value="">Select value</option>
<?php
	$qry= mysqli_query($con,"select * from tbl_billing order by vchbilling_type");

	if($qry)
	{
		while($row1=mysqli_fetch_array($qry))
		{
			?>
			<option value="<?php echo $row1['vchbilling_id'];?>" <?php if($row['vchbilling_type']==$row1['vchbilling_id']){echo "selected";} ?> > <?php echo $row1['vchbilling_type']; ?> </option>
			<?php
		}
	}
?>
</select>
<span class="error">* <?php echo $billingtypeErr;?>
</td></tr>
<tr></tr><tr></tr>
<tr>
<td>SOW Status</td>
<td>
<select name="selstatus" class="textbox"><option value="">Select value</option>
	<?php 
		$selsta=mysqli_query($con,"select * from tbl_sowstatus order by vchstatus_nm");
		while($rst=mysqli_fetch_array($selsta))
		{ ?>
		<option value="<?php echo $rst['istatus_id'];?>" <?php if($row['istatus_id']==$rst['istatus_id']){echo "selected";} ?> > <?php echo $rst['vchstatus_nm']; ?> </option>
		<?php }

	?>
</select>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Description</td><td><textarea  class="textbox" name="desc" rows="4" cols="25"><?php echo $row['vchdescription']; ?></textarea></td>
</tr>
<?php } ?>
<tr></tr><tr></tr>
<tr>
<td align="center"><input name="btnsub" type="submit" value="Update"  class="patiya"></td>
	<td><a href="sow.php"><input type="button" value="Cancel"  class="patiya"></a></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr><td class="error" align="right" colspan="2"><h3>* Required Field</h3></td></tr>
</table>

</form>
</center>

<?php
if(isset($_POST['btnsub']))
{
	//echo "dfjshdfj";
	if($status==0)
	{
	$sowqry=mysqli_query($con,"update tbl_sow set vchproject_name='$_POST[proj_name]', vchclient_name='$_POST[clnt_name]', dsow_startDate='$_POST[startdate]', dsow_endDate='$_POST[enddate]', vchacc_manager='$_POST[selacc]', vchbilling_type='$_POST[billingtype]', istatus_id='$_POST[selstatus]', vchdescription='$_POST[desc]' where vchproject_id='$_GET[sowid]'");

		if($sowqry)
		{
			$_SESSION['projid']=$_POST['proj_id'];
			echo "<script type='text/javascript'>";
			echo "alert('SOW details updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='sow.php';</script>";
		}
		else
		{
			echo "<center class=error>Record is not inserted</center>";
		}
	}
	else
	{
		echo "<center class=error></center>";
	}
}

}

}

?>