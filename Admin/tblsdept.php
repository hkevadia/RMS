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

$query=mysqli_query($con,"select * from tbl_subdept");
echo "<center><form method=POST onsubmit=ShowLoading()>";

if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
		
			<table class="t2" style="width:50%;">
			<br><br><br>
			<h2>Manage Sub-Department</h2>
			<tr><th>Sub-Department ID</th><th>Sub-Department Name</th><th>Department</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchSdept_id'];?></td>
			<td><?php echo $r['vchSdept_name'];?></td>
			<td>
			<?php
				$qry=mysqli_query($con,"select * from tbl_dept where vchdept_id='$r[vchdept_id]' ");
				if($qry)
				{
					while($row1=mysqli_fetch_array($qry))
					{
						echo $row1['vchdept_name'];
					}
				} ?>
					</td><td></td></tr></select>
		<?php } ?>
		
			<tr>
			<td><input type="text" class="textbox2" name="txtsdptidn" value="<?php if(isset($_POST['txtsdptidn'])) { echo $_POST['txtsdptidn']; } ?>"></td>
			<td><input type="text" class="textbox2" name="txtsdptnmn" value="<?php if(isset($_POST['txtsdptnmn'])) { echo $_POST['txtsdptnmn']; } ?>"></td>
			<td><select name="dept" class="textbox2">
			<?php
				$qry=mysqli_query($con,"select * from tbl_dept");
				if($qry)
				{
					while($row1=mysqli_fetch_array($qry))
					{
			?>
						<option value="<?php echo $row1['vchdept_id']; ?>" <?php if(isset($_POST['dept'])){if($_POST['dept']==$row1['vchdept_id']){echo "selected";}} ?> > <?php echo $row1['vchdept_name']; ?> </option>
				<?php }} ?>
					</td></select>
		<?php  ?>
			<td><input type="submit" name="btnadsdpt" class="lg" title="Save">&nbsp;<a href="tblsdept.php"><img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" ></td></td>
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
			<h2>Manage Sub-Department</h2>
			<tr><th>Sub-Department ID</th><th>Sub-Department Name</th><th>Department</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchSdept_id'];?></td>
			<td><?php echo $r['vchSdept_name'];?></td>
			<td>
			<?php
				$qry=mysqli_query($con,"select * from tbl_dept where vchdept_id='$r[vchdept_id]' ");
				//(select vchdept_id from tbl_subdept where vchSdept_id='$r[vchSdept_id]')");
				if($qry)
				{
					while($row1=mysqli_fetch_array($qry))
					{
						echo $row1['vchdept_name'];
					}
				} ?>
					</td>
			<td class="tb2"><a href="tblsdept.php?sdptupdt=<?php echo $r['vchSdept_id'];?>"><img src="../icons/edit.png"  class = "ig" title="Update" name="update" ></a>
				<a href="tblsdept.php?sdptupdt1=<?php echo $r['vchSdept_id'];?>"  onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png"  class = "ig" title="Delete" name="delete" ></a>
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
<input type="submit" name="btnadd" value="Add" class="button">&nbsp;&nbsp;<a href="home.php"><input type="button" class="button" value="Cancel"></a>
</form>


<?php 

if(isset($_POST['btnadsdpt']))
{
	$status=0;
	
	if (empty($_POST['txtsdptidn']))
	{
		$status=1;
		echo "<center class=error>Sub-Department Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtsdptidn']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Sub-Department Id</center>"; 
		}
	}
	if (empty($_POST['txtsdptnmn']))
	{
		$status=1;
		echo "<center class=error>Sub-Department Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtsdptnmn']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
$qdept=mysqli_query($con,"select vchSdept_id from tbl_subdept where vchSdept_id='$_POST[txtsdptidn]'");
if(mysqli_num_rows($qdept)>0)
{
echo "<script type='text/javascript'>";
echo "alert('Sub-department id already exist....')";
echo "</script>";
}
else{
		$q=mysqli_query($con,"insert into tbl_subdept values('$_POST[txtsdptidn]','$_POST[txtsdptnmn]','$_POST[dept]')");
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Sub-department is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblsdept.php';</script>";
		}
		else
		{
			echo "<center class=error>Sub-department is not created.</center>";
		}
}
	}
}
?>

<?php 

if(isset($_GET['sdptupdt']))
{
	$s=mysqli_query($con,"select * from tbl_subdept where vchSdept_id='$_GET[sdptupdt]'");
	
			echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here : </h2>";
	if($s)
	{
		while($r1=mysqli_fetch_array($s))
		{
			?>
			<input type="text" class="textbox" name="txtsdptid1" value="<?php echo $r1['vchSdept_id'];?>" readonly><br>
			<input type="text" class="textbox" style="margin:12px 0 12px 0;" name="txtsdptnm1" value="<?php echo $r1['vchSdept_name'];?>"><br>
			<select name="dept" class="textbox" style="margin:0px 0 12px 0;">
			<?php
				$qry=mysqli_query($con,"select * from tbl_dept");
				if($qry)
				{
					while($row1=mysqli_fetch_array($qry))
					{
			?>
						<option value="<?php echo $row1['vchdept_id']; ?>" <?php if($r1['vchdept_id']==$row1['vchdept_id']){echo "selected";} ?><?php if(isset($_POST['dept'])){if($_POST['dept']==$row1['vchdept_id']){echo "selected";}} ?> > <?php echo $row1['vchdept_name']; ?> </option>
				<?php }} ?>
				</select><br>
		<?php  ?>
			<input type="submit" name="btnsdptupdt" class="button" value="Update">
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
if(isset($_POST['btnsdptupdt']))
{
	$status=0;
	
	if (empty($_POST['txtsdptid1']))
	{
		$status=1;
		echo "<center class=error>Sub-Department Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtsdptid1']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Sub-Department Id</center>"; 
		}
	}
	if (empty($_POST['txtsdptnm1']))
	{
		$status=1;
		echo "<center class=error>Sub-Department Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtsdptnm1']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
		$updt=mysqli_query($con,"update tbl_subdept set vchSdept_id='$_POST[txtsdptid1]',vchSdept_name='$_POST[txtsdptnm1]',vchdept_id='$_POST[dept]' where vchSdept_id='$_GET[sdptupdt]'");
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Sub-department is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblsdept.php';</script>";
		}
	}
}
?>


<?php  
if(isset($_GET['sdptupdt1']))
{
	$qry1="select * from tbl_emp where vchSdept_id='$_GET[sdptupdt1]' AND bemp_status!='0' ";
	$res=mysqli_query($con,$qry1);
	
	if(mysqli_fetch_array($res)==0)
	{
	
		$del=mysqli_query($con,"delete from tbl_subdept where vchSdept_id='$_GET[sdptupdt1]'");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Sub-department is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblsdept.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Sub-department is allocated to the employee....')";
		echo "</script>";
	}
}
if(isset($_POST['btncan']))
{
	header('location:tblsdept.php');
}
echo "</center>";

?>
</div>