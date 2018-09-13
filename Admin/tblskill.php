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

$query=mysqli_query($con,"select * from tbl_skills");
echo "<center><form method=POST onsubmit=ShowLoading()>";
if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
			<table class="t2" style="width:45%;">
			<br><br><br>
			<h2>Manage Skill</h2>
			<tr><th>Skill ID</th><th>Skill Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchSkills_id'];?></td>
			<td><?php echo $r['vchSkills'];?></td>
			<td></td>
			</tr>
			<?php } ?>
			<tr>
			<td><input type="text" name="txtsidn" class="textbox" value="<?php if(isset($_POST['txtsidn'])) { echo $_POST['txtsidn']; } ?>"></td>
			<td><input type="text" name="txtsnmn" class="textbox" value="<?php if(isset($_POST['txtsnmn'])) { echo $_POST['txtsnmn']; } ?>"></td>
			<td><input type="submit" class="lg" name="btnadskill" title="Save">&nbsp;<a href="tblskill.php"><img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" ></td></td>
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
			<h2>Manage Skill</h2>
			<tr><th>Skill ID</th><th>Skill Name</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchSkills_id'];?></td>
			<td><?php echo $r['vchSkills'];?></td>
			<td class="tb2"><a href="tblskill.php?supdt=<?php echo $r['vchSkills_id'];?>"><img src="../icons/edit.png"  class = "ig" title="Update" name="update" ></a>
				<a href="tblskill.php?supdt1=<?php echo $r['vchSkills_id'];?>"  onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png"  class = "ig" title="Delete" name="delete" ></a>
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
if(isset($_GET['supdt1']))
{
	$qry1="select * from tbl_emp where vchSkills_id='$_GET[supdt1]' AND bemp_status!='0' ";
	$res=mysqli_query($con,$qry1);
	
	if(mysqli_fetch_array($res)==0)
	{
		$del=mysqli_query($con,"delete from tbl_skills where vchSkills_id='$_GET[supdt1]'");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Skill is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblskill.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Skill is allocated to the employee....')";
		echo "</script>";
	}
}
?>

<?php 

if(isset($_POST['btnadskill']))
{
	$status=0;
	
	if (empty($_POST['txtsidn']))
	{
		$status=1;
		echo "<center class=error>Skill Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtsidn']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Skill Id</center>"; 
		}
	}
	if (empty($_POST['txtsnmn']))
	{
		$status=1;
		echo "<center class=error>Skill Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtsnmn']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
$qdept=mysqli_query($con,"select vchSkills_id from tbl_skills where vchSkills_id ='$_POST[txtsidn]'");
if(mysqli_num_rows($qdept)>0)
{
echo "<script type='text/javascript'>";
echo "alert('Skill id already exist....')";
echo "</script>";
}
else{

	$q=mysqli_query($con,"insert into tbl_skills values('$_POST[txtsidn]','$_POST[txtsnmn]')");
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Skill is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblskill.php';</script>";
		}
		else
		{
			echo "<center class=error>Skill is not created.</center>";
		}
}
	}
}
?>

<?php 

if(isset($_GET['supdt']))
{
	//echo "dsjfhsuihjasdh";
	$s=mysqli_query($con,"select * from tbl_skills where vchSkills_id='$_GET[supdt]'");
	
			echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here : </h2>";

	if($s)
	{
		while($r1=mysqli_fetch_array($s))
		{
			//echo "aaaaaaaaaa";
			//$r1=mysqli_fetch_row($s);
			?>
			<input type="text" class="textbox" name="txtsid1" value="<?php echo $r1['vchSkills_id'];?>" readonly><br>
			<input type="text" name="txtsnm1"  style="margin:12px 0 12px 0;" class="textbox" value="<?php echo $r1['vchSkills'];?>"><br>
			<input type="submit" class="button" name="btnsupdt" value="Update">
			<input type="submit" class="button" name="btncan" value="Cancel"><br><br>
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
if(isset($_POST['btnsupdt']))
{
	$status=0;
	
	if (empty($_POST['txtsid1']))
	{
		$status=1;
		echo "<center class=error>Skill Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtsid1']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Skill Id</center>"; 
		}
	}
	if (empty($_POST['txtsnm1']))
	{
		$status=1;
		echo "<center class=error>Skill Name is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtsnm1']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}
	if($status==0)
	{
		$updt=mysqli_query($con,"update tbl_skills set vchSkills_id='$_POST[txtsid1]',vchSkills='$_POST[txtsnm1]' where vchSkills_id='$_GET[supdt]'");
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Skill is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblskill.php';</script>";
		}
	}
}
?>


<?php 
if(isset($_POST['btncan']))
{
	header('location:tblskill.php');
}
echo "</center>";

?>
</div>