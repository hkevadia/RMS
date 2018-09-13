<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";

echo '<div class="font">';

require_once "database.php";
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
 $(function() {
            $( "#dpxyz1" ).datepicker({ dateFormat: "dd-mm-yy" });
            $( "#dpxyz1" ).datepicker("show");
         });
      </script>

<?php
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:index.php');
}
$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[adminid]' ");
$r=mysqli_fetch_array($q);

$status=0;

// define variables and set to empty values
$proj_idErr = $proj_nameErr = $etypeErr = $proj_mngrErr = $clnt_nameErr = $billingtypeErr = $startdateErr = $enddateErr = $acc_mngrErr = $descErr = "";
$proj_id = $proj_name = $etype = $proj_mngr = $clnt_name = $billingtype = $startdate = $enddate = $acc_mngr = $desc = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["proj_id"])) 
	{
		$status=1;
		$proj_idErr = "Project Id is required";
    } 
	else 
	{
		$proj_id = test_input($_POST["proj_id"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[A-Za-z0-9_]{1,20}$/",$proj_id)) 
		{
			$status=1;
			$proj_idErr = "Enter Valid Project Id"; 
		}
	}
	
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
		$clnt_nameErr = "Customer Name is required";
	}
	else 
	{
		$clnt_name = test_input($_POST["clnt_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[A-Z a-z 0-9]+$/",$clnt_name))
		{
			$status=1;
			$clnt_nameErr = "Enter Valid Customer Name"; 
		}
	}

	if(empty($_POST["startdate"]))
	{
		$status=1;
		$startdateErr = "Select SOW Start Date";
	}
	
	if(empty($_POST["enddate"]))
	{
		$status=1;
		$enddateErr = "Select SOW End Date";
	}
	if($_POST["enddate"] < $_POST["startdate"])
	{
		$status=1;
		$enddateErr = "Select valid End Date";
	}
	
	if (empty($_POST["selacc"]))
	{
		$status=1;
		$acc_mngrErr = "Account Manager is required";
	}
	if(empty($_POST["billingtype"]))
	{
		$status=1;
		$billingtypeErr = "Select Billing Type";
	}
	if (empty($_POST["selstatus"]))
	{
		$status=1;
		$status_Err = "Select SOW status";
	}
        if (empty($_POST["seldept"]))
	{
		$status=1;
		$status_Err1 = "Select Department";
	}
        if (empty($_POST["selbloc"]))
	{
		$status=1;
		$status_Err2 = "Select Billing location";
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
<br/><br/>
<center>
<h2>Create SOW </h2>
<form method="post" onsubmit="ShowLoading()">
<table border="1" class="t5">
<tr><th colspan='8' align='left'>SOW Details </th></tr>

<tr>
	<td>SOW Id</td><td><input name="proj_id" type="text"  class="textbox" value="<?php 
if(isset($_POST['proj_id'])) { echo $_POST['proj_id']; } 
else
	{ $y=date("Y");
$m=date("m");
echo $y."_".$m."_"; }
?>" placeholder="Project Id"> <span class="error">* <?php echo $proj_idErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Project Name</td><td><input name="proj_name" type="text" maxlength="25" class="textbox" value="<?php if(isset($_POST['proj_name'])) { echo $_POST['proj_name']; } ?>" placeholder="Project Name"> <span class="error"> * <?php echo $proj_nameErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Customer Name</td><td><input name="clnt_name"  class="textbox" maxlength="25"type="text" value="<?php if(isset($_POST['clnt_name'])) { echo $_POST['clnt_name']; } ?>" placeholder="Customer name"> <span class="error"> * <?php echo $clnt_nameErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>SOW Start date</td>
<td>
<!--<input name="startdate" type="text" value="<?php //if(isset($_POST['startdate'])) { echo $_POST['startdate']; } ?>" id="startdate">--> 
<input name="startdate" type="text" id="dpxyz" class="textbox" 
 value="<?php if(isset($_POST['startdate'])) { echo $_POST['startdate']; } ?>" ><span class="error"> * <?php echo $startdateErr;?></span>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>SOW End date</td>
<td>
<!--<input name="enddate" type="text" value="<?php //if(isset($_POST['enddate'])) { echo $_POST['enddate']; } ?>" id="enddate">-->
<input name="enddate" type="text" id="dpxyz1" class="textbox"
 value="<?php if(isset($_POST['enddate'])) { echo $_POST['enddate']; } ?>" > <span class="error">* <?php echo $enddateErr;?></span>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Account Manager</td>
<td><select name="selacc" class="textbox">
	<option value="">Select Value</option>
<?php
	$aqry=mysqli_query($con,"select vchemp_id,vchemp_Fname,vchemp_Lname from tbl_emp where vchdesignation_id=(select vchdesignation_id from tbl_designation where vchdesignation_name='Acc_manager') order by vchemp_Fname");
	
	if($aqry)
	{
		while($ac=mysqli_fetch_array($aqry))
		{
			?>
			<option value="<?php echo $ac['vchemp_id']; ?>" <?php if(isset($_POST['selacc'])){if($_POST['selacc']==$ac['vchemp_id']){echo "selected";}} ?> > <?php echo $ac['vchemp_id']. " | " . $ac['vchemp_Fname'] ." ". $ac['vchemp_Lname']; ?> </option>
			<?php
		}
	}
?>
</select>
 <span class="error">* <?php echo $acc_mngrErr;?></span> </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Billing Type</td>
<td><select name="billingtype"  class="textbox">
	<option value="">Select Value</option>
<?php
	$qry= mysqli_query($con,"select * from tbl_billing order by vchbilling_type");

	if($qry)
	{
		while($row1=mysqli_fetch_array($qry))
		{
			?>
			<option value="<?php echo $row1['vchbilling_id'];?>" <?php if(isset($_POST['billingtype'])){if($_POST['billingtype']==$row1['vchbilling_id']){echo "selected";}} ?> > <?php echo $row1['vchbilling_type']; ?> </option>
			<?php
		}
	}
?>
</select>
<span class="error">* <?php echo $billingtypeErr;?></span>
</td></tr>
<tr></tr><tr></tr>
<tr>
<td>SOW Status</td>
<td>
<select name="selstatus" class="textbox">
	<option value="">Select Value</option>
	<?php 
		$selsta=mysqli_query($con,"select * from tbl_sowstatus order by vchstatus_nm");
		while($rst=mysqli_fetch_array($selsta))
		{
			?>
			<option value="<?php echo $rst['istatus_id'];?>" <?php if(isset($_POST['selstatus'])){if($_POST['selstatus']==$rst['istatus_id']){echo "selected";}} ?> > <?php echo $rst['vchstatus_nm']; ?> </option>
			<?php
		}

	?>
</select>
<span class="error">* <?php echo $status_Err;?></span> </td>
</td></tr>
<tr></tr><tr></tr>
<tr>
<td>Department</td>
<td>
<select name="seldept" class="textbox">
	<option value="">Select Value</option>
	<?php 
		$selsta=mysqli_query($con,"select * from tbl_dept order by vchdept_name");
		while($rst=mysqli_fetch_array($selsta))
		{
			?>
			<option value="<?php echo $rst['vchdept_id'];?>" <?php if(isset($_POST['seldept'])){if($_POST['seldept']==$rst['vchdept_id']){echo "selected";}} ?> > <?php echo $rst['vchdept_name']; ?> </option>
			<?php
		}

	?>
</select>
<span class="error">* <?php echo $status_Err1;?></span> </td>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Billing Location</td>
<td>
<select name="selbloc" class="textbox">
	<option value="">Select Value</option>
	<?php 
		$selsta=mysqli_query($con,"select * from tbl_blocation order by vchblocation_name");
		while($rst=mysqli_fetch_array($selsta))
		{
			?>
			<option value="<?php echo $rst['vchblocation_id'];?>" <?php if(isset($_POST['selbloc'])){if($_POST['selbloc']==$rst['vchblocation_id']){echo "selected";}} ?> > <?php echo $rst['vchblocation_name']; ?> </option>
			<?php
		}

	?>
</select>
<span class="error">* <?php echo $status_Err2;?></span> </td>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Description</td><td><textarea  class="textbox" name="desc" rows="4" cols="25" style="font-family: sans-serif;
    font-variant: all;
   font-weight:550;
	font-size: 14px;
	color: #2F2f2f;"><?php if(isset($_POST['desc'])) { echo $_POST['desc']; } ?></textarea></td>
</tr>

<tr></tr><tr></tr><tr></tr><tr></tr>
<tr>
<td><input name="btnsub" type="submit" value="Create" class="patiya" ></td>
<td><a href="sow_pg.php"><input type="button" value="Reset"  class="patiya"></a></td>
</tr>

<tr><td class="error" align="right" colspan="2"><h3>* Required Field</h3></td></tr>
</table>

</form>
</center>

<?php
if(isset($_POST['btnsub']))
{
	//echo "dfjshdfj";
          $qmail=mysqli_query($con,"select * from tbl_sow ");
while($rmail=mysqli_fetch_array($qmail))
{
	if($rmail['vchproject_id']==$_POST['proj_id'])
	{
		echo "<script type='text/javascript'>";
		echo "alert('SOW id already exist....')";
		echo "</script>";
	}
	
}
	if($status==0)
	{
                           $date = $_POST['startdate'];
                           $dd=date_create($date);
                           $start_date=date_format($dd,"Y-m-d");
                                 $date1 = $_POST['enddate'];
                           $dd1=date_create($date1);
                           $end_date=date_format($dd1,"Y-m-d");
	$sowqry=mysqli_query($con,"insert into tbl_sow (vchproject_id,vchproject_name,vchclient_name,dsow_startDate,dsow_endDate,vchacc_manager,vchbilling_type,vchdescription,vchph,vchpm,istatus_id,vchRea_id,bproj_status,vchdept_id,vchblocation_id) values ('$_POST[proj_id]','$_POST[proj_name]','$_POST[clnt_name]','$start_date','$end_date','$_POST[selacc]','$_POST[billingtype]','$_POST[desc]','$_SESSION[adminid]','','$_POST[selstatus]','','1','$_POST[seldept]','$_POST[selbloc]') ");

		if($sowqry)
		{
			$_SESSION['projid']=$_POST['proj_id'];
			echo "<script type='text/javascript'>";
				echo "alert('SOW details filled successfully....')";
				echo "</script>";
				echo "<script>window.location.href='sow_req.php';</script>";
		}
		else
		{
			echo "<center class=error>Record is not inserted</center>" . mysqli_error($con);
		}
	}
	else
	{
		echo "<center class=error></center>";
	}
}
?>			