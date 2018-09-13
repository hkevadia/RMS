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

$query=mysqli_query($con,"select * from tbl_disable_proj");
echo "<center><form method=POST onsubmit=ShowLoading()>";
if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
			<table class="t2" style="width:45%;">
			<br><br><br>

			<h2>Project Disable Reason</h2>
			<tr><th>Reason ID</th><th>Reason Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchRea_id'];?></td>
			<td><?php echo $r['vchRea_name'];?></td>
			<td></td>
			</tr>
			<?php } ?>
			<tr>
			<td><input type="text" class="textbox" name="txtridn" value="<?php if(isset($_POST['txtridn'])) { echo $_POST['txtridn']; } ?>"></td>
			<td><input type="text" class="textbox" name="txtrnmn" value="<?php if(isset($_POST['txtrnmn'])) { echo $_POST['txtrnmn']; } ?>"></td>
			<td><input type="submit" class="lg" name="btnadrea" title="Save">&nbsp;<a href="tblreason.php"><img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" ></td></td>
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
			<table class="t2" style="width:45%;">
			<br><br>
			<h2>Project Disable Reason</h2>
			<tr><th>Reason ID</th><th>Reason Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchRea_id'];?></td>
			<td><?php echo $r['vchRea_name'];?></td>
			<td class="tb2"><a href="tblreason.php?reaupdt=<?php echo $r['vchRea_id'];?>"><img src="../icons/edit.png"  class = "ig" title="Update" name="update" ></a>
				<a href="tblreason.php?reaupdt1=<?php echo $r['vchRea_id'];?>"  onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png"  class = "ig" title="Delete" name="delete" ></a>
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
<input type="submit" name="btnadd" value="Add" class="button">&nbsp;&nbsp;<a href="home.php"><input type="button" class="button" value="Cancel" name="btncan"></a>
</form>


<?php 

if(isset($_POST['btnadrea']))
{
	$status=0;
	
	if (empty($_POST['txtridn']))
	{
		$status=1;
		echo "<center class=error>Reason Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtridn']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Reason Id</center>"; 
		}
	}
	if (empty($_POST['txtrnmn']))
	{
		$status=1;
		echo "<center class=error>Reason Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtrnmn']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
$qdept=mysqli_query($con,"select vchRea_id from tbl_disable_proj where vchRea_id ='$_POST[txtridn]'");
if(mysqli_num_rows($qdept)>0)
{
echo "<script type='text/javascript'>";
echo "alert('Reason id already exist....')";
echo "</script>";
}
else {
		$q=mysqli_query($con,"insert into tbl_disable_proj values('$_POST[txtridn]','$_POST[txtrnmn]')");
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Reason is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblreason.php';</script>";
		}
		else
		{
			echo "<center class=error>Reason is not created.</center>";
		}
}
	}
}
?>

<?php 

if(isset($_GET['reaupdt']))
{
	//echo "dsjfhsuihjasdh";
	$s=mysqli_query($con,"select * from tbl_disable_proj where vchRea_id='$_GET[reaupdt]'");
	
			echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here : </h2>";
	if($s)
	{
		while($r1=mysqli_fetch_array($s))
		{
			//echo "aaaaaaaaaa";
			//$r1=mysqli_fetch_row($s);
			?>
			<input type="text" class="textbox" name="txtrid1" value="<?php echo $r1['vchRea_id'];?>" readonly><br>
			<input type="text" class="textbox" style="margin:12px 0 12px 0;" name="txtrnm1" value="<?php echo $r1['vchRea_name'];?>"><br>
			<input type="submit" class="button" name="btnreaupdt" value="Update">
			<input type="submit" class="button" name="btncan" value="Cancel"><br>
			<?php
		}
	}
	else
        { 
                //echo mysqli_error($con); 
        }
	echo "</fieldset>";
	echo "</form>";
}

?>

<?php  
if(isset($_POST['btnreaupdt']))
{
	$status=0;
	
	if (empty($_POST['txtrid1']))
	{
		$status=1;
		echo "<center class=error>Reason Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtrid1']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Reason Id</center>"; 
		}
	}
	if (empty($_POST['txtrnm1']))
	{
		$status=1;
		echo "<center class=error>Reason Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtrnm1']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
		$updt=mysqli_query($con,"update tbl_disable_proj set vchRea_id='$_POST[txtrid1]',vchRea_name='$_POST[txtrnm1]' where vchRea_id='$_GET[reaupdt]'");
		
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Reason is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblreason.php';</script>";
		}
	}
}
?>


<?php  
if(isset($_GET['reaupdt1']))
{
	$qry1="select * from tbl_sow where vchRea_id='$_GET[reaupdt1]' ";
	$res=mysqli_query($con,$qry1);
	
	if(mysqli_fetch_array($res)==0)
	{
		
		$del=mysqli_query($con,"delete from tbl_disable_proj where vchRea_id='$_GET[reaupdt1]' ");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Reason is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblreason.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Reason is allocated to the project....')";
		echo "</script>";
	}
}
if(isset($_POST['btncan']))
{
	header('location:tblreason.php');
}
echo "</center>";

?>
</div>