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

$query=mysqli_query($con,"select * from tbl_blocation");
echo "<center><form method=POST onsubmit=ShowLoading()>";
if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
			<table class="t2" style="width:45%;">
                        <br><br><br>
			<h2>Manage Billing Location</h2>
			<tr><th>Billing Location ID</th><th>Billing Location Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchblocation_id'];?></td>
			<td><?php echo $r['vchblocation_name'];?></td>
			<td></td>
			</tr>
			<?php } ?>
			<tr>
			<td><input type="text" name="txtlidn" class="textbox" value="<?php if(isset($_POST['txtlidn'])) { echo $_POST['txtlidn']; } ?>"></td>
			<td><input type="text" name="txtlnmn" class="textbox" value="<?php if(isset($_POST['txtlnmn'])) { echo $_POST['txtlnmn']; } ?>"></td>
			<td><input type="submit" class="lg" name="btnaddes" title="Save"><a href="tblblocation.php">&nbsp;<img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" style="padding-top:2px;" ></td></td>
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
			<br><br><br>
			<h2>Manage Billing Location</h2>
			<tr><th>Billing Location ID</th><th>Billing Location Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchblocation_id'];?></td>
			<td><?php echo $r['vchblocation_name'];?></td>
			<td class="tb2"><a href="tblblocation.php?lupdt=<?php echo $r['vchblocation_id'];?>"><img src="../icons/edit.png"  class = "ig" title="Update" name="update" ></a>
				<a href="tblblocation.php?lupdt1=<?php echo $r['vchblocation_id'];?>"  onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png"  class = "ig" title="Delete" name="delete" ></a>
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
<input type="submit" name="btnadd" class="button" value="Add">&nbsp;&nbsp;<a href="home.php"><input type="button" class="button" value="Cancel"></a>
</form>


<?php 

if(isset($_POST['btnaddes']))
{
	$status=0;
	
	if (empty($_POST['txtlidn']))
	{
		$status=1;
		echo "<center class=error>Billing Location Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtlidn']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Billing Location Id</center>"; 
		}
	}
	if (empty($_POST['txtlnmn']))
	{
		$status=1;
		echo "<center class=error>Billing Location Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z _a-z]*$/",$_POST['txtlnmn']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
$qdept=mysqli_query($con,"select vchblocation_id from tbl_blocation where vchblocation_id ='$_POST[txtlidn]'");
if(mysqli_num_rows($qdept)>0)
{
echo "<script type='text/javascript'>";
echo "alert('Billing Location id already exist....')";
echo "</script>";
}
else
{
		$q=mysqli_query($con,"insert into tbl_blocation values('$_POST[txtlidn]','$_POST[txtlnmn]')");
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Billing Location is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblblocation.php';</script>";
		}
		else
		{
			echo "<center class=error>Billing Location is not created.</center>";
		}
}
	}
}
?>

<?php 

if(isset($_GET['lupdt']))
{
	$s=mysqli_query($con,"select * from tbl_blocation where vchblocation_id='$_GET[lupdt]'");
	
			echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here : </h2>";
	if($s)
	{
		while($r1=mysqli_fetch_array($s))
		{
			?>
			<input type="text" name="txtlid1" class="textbox" value="<?php echo $r1['vchblocation_id'];?>" readonly> <br>
			<input type="text" name="txtlnm1" class="textbox" style="margin:12px 0 12px 0;" value="<?php echo $r1['vchblocation_name'];?>"> <br>
			<input type="submit" name="btnlupdt" class="button" value="Update">
			<input type="submit" name="btncan" class="button" value="Cancel"><br>
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
if(isset($_POST['btnlupdt']))
{
        
	$status=0;
	
	if (empty($_POST['txtlid1']))
	{
		$status=1;
		echo "<center class=error>Billing Location Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtlid1']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Billing Location Id</center>"; 
		}
	}
	if (empty($_POST['txtlnm1']))
	{
		$status=1;
		echo "<center class=error>Billing Location Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z _a-z]*$/",$_POST['txtlnm1']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
		$updt=mysqli_query($con,"update tbl_blocation set vchblocation_id='$_POST[txtlid1]',vchblocation_name='$_POST[txtlnm1]' where vchblocation_id='$_GET[lupdt]'");
	
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Billing Location is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblblocation.php';</script>";
		}
	}
}
?>


<?php  
if(isset($_GET['lupdt1']))
{
	$qry1="select * from tbl_emp where vchblocation_id='$_GET[lupdt1]' AND bemp_status!='0' ";
	$res=mysqli_query($con,$qry1);
	
	if(mysqli_fetch_array($res)==0)
	{
		
		$del=mysqli_query($con,"delete from tbl_blocation where vchblocation_id='$_GET[lupdt1]'");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Billing Location is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblblocation.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Billing Location is allocated to the employee....')";
		echo "</script>";
	}
}
if(isset($_POST['btncan']))
{
	header('location:tblblocation.php');
}
echo "</center>";
?>
</div>