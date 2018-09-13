<?php

session_start();
error_reporting(E_ERROR | E_PARSE);
//echo "<center>Welcome....<b>".$_SESSION['adminid']."</b></center><br/><br/>";
include "../header.php";

echo "<div class='font'>";


if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}

?>

<?php
require_once "database.php";

$query=mysqli_query($con,"select * from tbl_designation");
echo "<center><form method=POST onsubmit=ShowLoading()>";
if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
			<table class="t2" style="width:50%;">
			<br><br><br>
			<h2>Manage Designation</h2>
			<tr><th>Designation ID</th><th>Designation Name</th><th>Band</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchdesignation_id'];?></td>
			<td><?php echo $r['vchdesignation_name'];?></td>
			<td><?php echo $r['vchband'];?></td>
			<td></td>
			</tr>
			<?php } ?>
			<tr>
			<td><input type="text" name="txtdidn" class="textbox2" value="<?php if(isset($_POST['txtdidn'])) { echo $_POST['txtdidn']; } ?>"></td>
			<td><input type="text" name="txtdnmn" class="textbox2" value="<?php if(isset($_POST['txtdnmn'])) { echo $_POST['txtdnmn']; } ?>"></td>
			<td><input type="text" name="txtbnmn" class="textbox2" value="<?php if(isset($_POST['txtbnmn'])) { echo $_POST['txtbnmn']; } ?>"></td>
			<td><input type="submit" name="btnaddes" class="lg" title="Save">&nbsp;<a href="tbldesignation.php"><img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" ></td></td>
			</tr>
			</table>
		<?php
	}
	else
	{
		//echo mysqli_error($con);
	}
}
else
{
	if($query)
	{
		?>
			<table class="t2" style="width:50%;">
			<br><br>
			<h2>Manage Designation</h2>
			<tr><th>Designation ID</th><th>Designation Name</th><th>Band</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchdesignation_id'];?></td>
			<td><?php echo $r['vchdesignation_name'];?></td>
			<td><?php echo $r['vchband'];?></td>
			<td class="tb2"><a href="tbldesignation.php?dupdt=<?php echo $r['vchdesignation_id'];?>"><img src="../icons/edit.png"  class = "ig" title="Update" name="update" ></a>
				<a href="tbldesignation.php?dupdt1=<?php echo $r['vchdesignation_id'];?>"  onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png"  class = "ig" title="Delete" name="delete" ></a>
			</tr>
			<?php } ?>
			</table>
		<?php
	}
	else
	{
		//echo mysqli_error($con);
	}
}

echo "</form>";
?>


<form onsubmit="ShowLoading()">
<br>
<input type="submit" name="btnadd" value="Add" class="button">&nbsp;&nbsp;<a href="home.php"><input type="button" value="Cancel" class="button"></a>
</form>


<?php 

if(isset($_POST['btnaddes']))
{
	$status=0;
	
	if (empty($_POST['txtdidn']))
	{
		$status=1;
		echo "<center class=error>Designation Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtdidn']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Designation Id</center>"; 
		}
	}
	if (empty($_POST['txtdnmn']))
	{
		$status=1;
		echo "<center class=error>Designation Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z._]*$/",$_POST['txtdnmn']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if (empty($_POST['txtbnmn']))
	{
		$status=1;
		echo "<center class=error>Band is required</center>";
	}
	else
	{
		if (preg_match("/[^a-z_\-0-9]/i",$_POST['txtbnmn']))
		{
			$status=1;
			echo "<center class=error>Enter valid Band</center>"; 
		}
	}
	if($status==0)
	{
$qdept=mysqli_query($con,"select vchdesignation_id from tbl_designation where vchdesignation_id='$_POST[txtdidn]'");
if(mysqli_num_rows($qdept)>0)
{
echo "<script type='text/javascript'>";
echo "alert('Designation id already exist....')";
echo "</script>";
}
else
{
		$q=mysqli_query($con,"insert into tbl_designation values('$_POST[txtdidn]','$_POST[txtdnmn]','$_POST[txtbnmn]')");
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Designation is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tbldesignation.php';</script>";
		}
		else
		{
			echo "<center class=error>Designation is not created.</center>";
		}
}
	}
}
?>

<?php 

if(isset($_GET['dupdt']))
{
	$s=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$_GET[dupdt]'");
	
			echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here : </h2>";
	if($s)
	{
		while($r1=mysqli_fetch_array($s))
		{
			?>
			<input type="text" class="textbox" name="txtdid1" value="<?php echo $r1['vchdesignation_id'];?>" readonly><br>
			<input type="text" class="textbox" name="txtdnm1" style="margin:12px 0 12px 0;" value="<?php echo $r1['vchdesignation_name'];?>"><br>
			<input type="text" class="textbox" name="txtbnm1" style="margin:0px 0 12px 0;" value="<?php echo $r1['vchband'];?>"><br>
			<input type="submit" class="button" name="btndupdt" value="Update">
			<input type="submit" class="button" name="btncan" value="Cancel"><br>
			<?php
		}
	}
	else
        { 
                //echo mysqli_error($con); 
        }
	echo "</fieldset></form>";
}

?>

<?php  
if(isset($_POST['btndupdt']))
{
	$status=0;
	
	if (empty($_POST['txtdid1']))
	{
		$status=1;
		echo "<p class=error>Designation Id is required</p>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtdid1']))
		{
			$status=1;
			echo "<p class=error>Enter Valid Designation Id</p>"; 
		}
	}
	if (empty($_POST['txtdnm1']))
	{
		$status=1;
		echo "<p class=error>Designation Name is required</p>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z._]*$/",$_POST['txtdnm1']))
		{
			$status=1;
			echo "<p class=error>Only letters allowed</p>"; 
		}
	}
	if (empty($_POST['txtbnm1']))
	{
		$status=1;
		echo "<p class=error>Band is required</p>";
	}
	else
	{
		if (preg_match("/[^a-z_\-0-9]/i",$_POST['txtbnmn']))
		{
			$status=1;
			echo "<p class=error>Enter valid Band</p>"; 
		}
	}
	if($status==0)
	{

		$updt=mysqli_query($con,"update tbl_designation set vchdesignation_id='$_POST[txtdid1]',vchdesignation_name='$_POST[txtdnm1]',vchband='$_POST[txtbnm1]' where vchdesignation_id='$_GET[dupdt]'");
	
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Designation is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tbldesignation.php';</script>";
		}

	}
}
?>


<?php  
if(isset($_GET['dupdt1']))
{
	$qry1="select * from tbl_emp where vchdesignation_id='$_GET[dupdt1]' AND bemp_status!='0' ";
	$res=mysqli_query($con,$qry1);
	
	if(mysqli_fetch_array($res)==0)
	{
		
		$del=mysqli_query($con,"delete from tbl_designation where vchdesignation_id='$_GET[dupdt1]'");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Designation is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tbldesignation.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Designation is allocated to the employee....')";
		echo "</script>";
	}
}
if(isset($_POST['btncan']))
{
	header('location:tbldesignation.php');
}
echo "</center>";

?>
</div>