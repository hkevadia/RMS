<?php

session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";
echo  "<div class='font'>";


if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}

require_once "database.php";

$status=1;

?>
<script>
	function rdsub()
	{
		document.forms[0].submit();
	}
</script>

<!DOCTYPE html>
<html>
<head>
<title>Disable Resource</title>
</head>
<body>
<center>
<br><br><br>
<h2>Disable Resource</h2>
<form method="post" onsubmit="ShowLoading()">
<table class="t4" border="1">
	<tr>
	<th colspan='2' align='left'>
		<?php
			$empq=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_GET[demp]'");
			$remp=mysqli_fetch_array($empq);
			echo $remp['vchemp_Fname'] ." ". $remp['vchemp_Lname'] ;
			?>
		</th>
	</tr>
<tr>
<td>Select One</td>
<td>
	<input type="radio" name="rd1" value="Resign" onChange="rdsub()" <?php if(isset($_POST['rd1'])  && $_POST['rd1']=="Resign"){ echo "<input type='radio' name='rd1' value='Resign'  checked >Resign"; }else{ echo " >Resign"; } ?>
	<input type="radio" name="rd1" value="Other"  onChange="rdsub()" <?php if(isset($_POST['rd1']) && $_POST['rd1']=="Other"){ echo "<input type='radio' name='rd1' value='Other' checked >Other"; }else{ echo " >Other"; } ?>
</td>
</tr>

<?php 
	if(isset($_POST['rd1']) && $_POST['rd1']=='Resign')
	{
?>
		<tr>
			<td>Resign date</td>
			<td>
			<input name="resigndate" type="date" class="textbox"
			 value="<?php if(isset($_POST['resigndate'])) { echo $_POST['resigndate']; } ?>" required>
			</td>
		</tr>
		<tr></tr><tr></tr>
		<tr>
			<td colspan='2' align="center"><input type="submit" class="button" name="btndis1" value="Disable">
			<input type="button" name="btncan1" value="Cancel" class="button" onclick="location.href='linkemp.php'"> </td>
		</tr>
<?php
	}
	if(isset($_POST['rd1']) && $_POST['rd1']=='Other')
	{ ?>
		<tr>
			<td>Start date</td>
			<td>
			<input name="startdate" type="date" class="textbox"
			 value="<?php if(isset($_POST['startdate'])) { echo $_POST['startdate']; } ?>" required>
			</td>
		</tr>
		<tr></tr><tr></tr>
		<tr>
			<td>End date</td>
			<td>
			<input name="enddate" type="date" class="textbox"
			 value="<?php if(isset($_POST['enddate'])) { echo $_POST['enddate']; } ?>" required>
			</td>
		</tr>
		<tr></tr><tr></tr>
		<tr>
			<td>Select Reason</td>
			<td>
			<select name="reaid" class="textbox">
			  <?php 
			$qry=mysqli_query($con,"select * from tbl_disable_res");
			if(mysqli_num_rows($qry)>0)
			{
				while($row1=mysqli_fetch_array($qry))
				{
					?>
					<option value="<?php echo $row1['vchRRea_id']; ?>" > <?php echo $row1['vchRRea_name']; ?> </option>
					<?php
				}
			}
			?>
			</select></td>
		</tr>
		<tr></tr><tr></tr>
		<tr>
			<td colspan='2' align="center"><input type="submit" class="button" name="btndis2" value="Submit">
			<input type="button" name="btncan2" value="Cancel" class="button" onclick="location.href='linkemp.php'"> </td>
		</tr>
<?php	
	}
?>
</table>
</body>
</html>

<?php
if(isset($_POST['btndis1']))
{
	$qry1="select DISTINCT allocated_emp_id from tbl_resource_allocation where allocated_emp_id='$_GET[demp]' ";
	$res=mysqli_query($con,$qry1);
	if(mysqli_fetch_array($res)==0)
	{
		$date="select * from tbl_emp where vchemp_id='$_GET[demp]' ";
		$dres=mysqli_query($con,$date);
		$rres=mysqli_fetch_array($dres);
		if($_POST['resigndate'] < $rres['djoining_date'])
		{
			echo "<script type='text/javascript'>";
			echo "alert('Resign date should be grater than Joining date....')";
			echo "</script>";
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Are you sure to disable this employee?')";
			echo "</script>";
		
			$mysql=mysqli_query($con,"update tbl_emp set dresign_date='$_POST[resigndate]',vchRRea_id='resign',bemp_status='0' where vchemp_id='$_GET[demp]' ");
			if($mysql)
			{
				echo "<script type='text/javascript'>";
				echo "alert('Resource is Disabled Successfully....')";
				echo "</script>";
				echo "<script>window.location.href='linkemp.php';</script>";
			}
			else
			{
				echo "<center class=error>Resource is not Disabled</center>";
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Resource is allocated to the project....')";
		echo "</script>";
	}
}

if(isset($_POST['btndis2']))
{
	$date="select * from tbl_emp where vchemp_id='$_GET[demp]' ";
	$dres=mysqli_query($con,$date);
	$rres=mysqli_fetch_array($dres);
	if($_POST['startdate'] < $rres['djoining_date'])
	{
		echo "<script type='text/javascript'>";
		echo "alert('Start should be grater than Joining date....')";
		echo "</script>";
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Are you sure to make unavailable this employee?')";
		echo "</script>";
		
			$mysql=mysqli_query($con,"update tbl_emp set dstart_date='$_POST[startdate]',dend_date='$_POST[enddate]',vchRRea_id='$_POST[reaid]',bemp_status='0' where vchemp_id='$_GET[demp]' ");
			if($mysql)
			{
				echo "<script type='text/javascript'>";
				echo "alert('Resource is Disabled Successfully....')";
				echo "</script>";
				echo "<script>window.location.href='linkemp.php';</script>";
			}
			else
			{
				echo "<center class=error>Resource is not Disabled</center>";
			}
	}
}
?>

</div>