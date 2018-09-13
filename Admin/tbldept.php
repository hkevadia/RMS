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

$query=mysqli_query($con,"select * from tbl_dept");
echo "<center><form method=POST onsubmit=ShowLoading()>";

if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
			<table class="t2" style="width:45%;">
			<br><br><br>
			<h2>Manage Department</h2>
			<tr><th>Department ID</th><th>Department Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchdept_id'];?></td>
			<td><?php echo $r['vchdept_name'];?></td>
			<td></td>
			</tr>
			<?php } ?>
			<tr>
			<td><input type="text" class="textbox" name="txtdptidn" value="<?php if(isset($_POST['txtdptidn'])) { echo $_POST['txtdptidn']; } ?>"> 
</td>
			<td><input type="text" class="textbox" name="txtdptnmn" value="<?php if(isset($_POST['txtdptnmn'])) { echo $_POST['txtdptnmn']; } ?>"></td>
			<td><input type="submit" class="lg" name="btnaddpt" title="Save">&nbsp;<a href="tbldept.php"><img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" ></td></td>
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
			<h2>Manage Department</h2>
			<tr><th>Department ID</th><th>Department Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchdept_id'];?></td>
			<td><?php echo $r['vchdept_name'];?></td>
			<td class="tb2"><a href="tbldept.php?dptupdt=<?php echo $r['vchdept_id'];?>"><img src="../icons/edit.png"  class = "ig" title="Update" name="update" ></a>
				<a href="tbldept.php?dptupdt1=<?php echo $r['vchdept_id'];?>" onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png"  class = "ig" title="Delete" name="delete" ></a>
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
<input type="submit" class="button" name="btnadd" value="Add">&nbsp;&nbsp;<a href="home.php"><input type="button" class="button" value="Cancel"></a>
</form>


<?php 

if(isset($_POST['btnaddpt']))
{
	$status=0;
	
	if (empty($_POST['txtdptidn']))
	{
		$status=1;
		echo "<center class=error>Department Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtdptidn']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Department Id</center>"; 
		}
	}
	if (empty($_POST['txtdptnmn']))
	{
		$status=1;
		echo "<center class=error>Department Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtdptnmn']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
$qdept=mysqli_query($con,"select vchdept_id from tbl_dept where vchdept_id='$_POST[txtdptidn]'");
if(mysqli_num_rows($qdept)>0)
{
echo "<script type='text/javascript'>";
echo "alert('Department id already exist....')";
echo "</script>";
}
else
{
		$q=mysqli_query($con,"insert into tbl_dept values('$_POST[txtdptidn]','$_POST[txtdptnmn]')");
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Department is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tbldept.php';</script>";
		}
		else
		{
			echo "<center class=error>Department is not created.</center>";
		}

}
	}
}
?>

<?php 

if(isset($_GET['dptupdt']))
{
	$s=mysqli_query($con,"select * from tbl_dept where vchdept_id='$_GET[dptupdt]'");
	
			echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here</h2>";
	if($s)
	{
		while($r1=mysqli_fetch_array($s))
		{
			?>
			<input type="text" class="textbox" name="txtdptid1" value="<?php echo $r1['vchdept_id'];?>" readonly><br>
			<input type="text" class="textbox" style="margin:12px 0 12px 0;" name="txtdptnm1" value="<?php echo $r1['vchdept_name'];?>"><br>
			<input type="submit" class="button" name="btndptupdt" value="Update">
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
if(isset($_POST['btndptupdt']))
{
	$status=0;
	
	if (empty($_POST['txtdptid1']))
	{
		$status=1;
		echo "<center class=error>Department Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtdptid1']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Department Id</center>"; 
		}
	}
	if (empty($_POST['txtdptnm1']))
	{
		$status=1;
		echo "<center class=error>Department Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtdptnm1']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
		$updt=mysqli_query($con,"update tbl_dept set vchdept_id='$_POST[txtdptid1]',vchdept_name='$_POST[txtdptnm1]' where vchdept_id='$_GET[dptupdt]'");
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Department is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tbldept.php';</script>";
		}
	}
}
?>


<?php  
if(isset($_GET['dptupdt1']))
{
	$qry1="select * from tbl_emp where vchdept_id='$_GET[dptupdt1]' AND bemp_status!='0' ";
	$res=mysqli_query($con,$qry1);
	
	if(mysqli_fetch_array($res)==0)
	{
		
		$del=mysqli_query($con,"delete from tbl_dept where vchdept_id='$_GET[dptupdt1]'");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Department is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tbldept.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Department is allocated to the employee....')";
		echo "</script>";
	}
}
if(isset($_POST['btncan']))
{
	header('location:tbldept.php');
}
echo "</center>";

?>
</div>	