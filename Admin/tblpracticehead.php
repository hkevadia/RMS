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
$status= 1;
$query=mysqli_query($con,"select * from tbl_practicehead");
echo "<center><form method=POST onsubmit=ShowLoading()>";
if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
			<!DOCTYPE html>
<!--<html>
<head>
<title>Manage Practice head</title>
</head>
<body>-->
			<table class="t2" style="width:45%;">
			<br><br><br>
			<h2>Manage Practice Head</h2>
			<tr><th>Employee</th><th>Department</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			
			<tr>
			<td>
			<?php
				$qry=mysqli_query($con,"select * from tbl_emp where vchemp_id='$r[vchemp_id]'");
				if($qry)
				{
					while($row1=mysqli_fetch_array($qry))
					{
	
						echo $row1['vchemp_Fname']." ".$row1['vchemp_Lname'];
			 	}} ?>
		</td>
			<td>
			<?php
				$qry1=mysqli_query($con,"select * from tbl_dept where vchdept_id='$r[vchdept_id]' " );
				if($qry1)
				{
					while($row2=mysqli_fetch_array($qry1))
					{
						echo $row2['vchdept_name'];
					}
				} ?>
			</td><td></td>
			</tr>
			<?php } ?>
			<tr>
			<td>
			<select name="empn" class="textbox">
			<?php
				$qry2=mysqli_query($con,"select * from tbl_emp where vchemp_id NOT IN(select DISTINCT vchemp_id from tbl_practicehead)");
				if($qry2)
				{
					while($row1=mysqli_fetch_array($qry2))
					{
			?>
						<option value="<?php echo $row1['vchemp_id']; ?>" <?php if(isset($_POST['empn'])){if($_POST['empn']==$row1['vchemp_id']){echo "selected";}} ?> > <?php echo $row1['vchemp_Fname']." ".$row1['vchemp_Lname']; ?> </option>
				<?php }} ?>
			</select></td>
			<td>
			<select name="deptn" class="textbox">
			<?php
				$qry3=mysqli_query($con,"select * from tbl_dept where vchdept_id NOT IN(select DISTINCT vchdept_id from tbl_practicehead)");
				if(mysqli_num_rows($qry3)>0)
				{
					$status=0;
					while($row1=mysqli_fetch_array($qry3))
					{
			?>
						<option value="<?php echo $row1['vchdept_id']; ?>" <?php if(isset($_POST['deptn'])){if($_POST['deptn']==$row1['vchdept_id']){echo "selected";}} ?> > <?php echo $row1['vchdept_name']; ?> </option>
				<?php 
					}
				}
				if($status==1)
				{
					echo "<script type='text/javascript'>";
					echo "alert('No data for Department....')";
					echo "</script>";
					echo "<script>window.location.href='tblpracticehead.php';</script>";
				}
				?>
			</select></td>
			<td><input type="submit" name="btnaddph" class="lg" title="Save">&nbsp;<a href="tblpracticehead.php"><img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" ></td>
			</tr>
			</table>
		<?php
	}
	else
	{
		echo mysqli_error($con);
	}
}
else
{
	if($query)
	{
		?>
			<table class="t2" style="width:45%;">
			<br><br><br>
			<h2>Manage Practice Head</h2>
			<tr><th>Emoloyee</th><th>Department</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			
			<tr>
			<td>
			
			<?php
				$qry4=mysqli_query($con,"select * from tbl_emp where vchemp_id='$r[vchemp_id]'");
				if($qry4)
				{
					while($row1=mysqli_fetch_array($qry4))
					{
			?>
						<?php echo $row1['vchemp_Fname'] . " " .$row1['vchemp_Lname']; ?>
				<?php }} ?>
		</td>
			<td>
			
			<?php
				$qry5=mysqli_query($con,"select * from tbl_dept where vchdept_id='$r[vchdept_id]' ");
				if($qry5)
				{
					while($row1=mysqli_fetch_array($qry5))
					{
			?>
						<?php echo $row1['vchdept_name']; ?>
				<?php }} ?>
			</td>
			<td class="tb2" align="center"><a href="tblpracticehead.php?bupdt=<?php echo $r['srno'];?>"><img src="../icons/edit.png"  class = "ig" title="Update" name="update" ></a>
				<a href="tblpracticehead.php?bupdt1=<?php echo $r['srno'];?>"  onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png" class = "ig" title="Delete" name="delete"></a></td>
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
<input type="submit" name="btnadd" class="button" value="Add"><a href="home.php">&nbsp;&nbsp;<input type="button"  class="button" value="Cancel"></a>
</form>


<?php 

if(isset($_POST['btnaddph']))
{
	$status=0;
	
	if (empty($_POST['empn']))
	{
		$status=1;
		echo "<center class=error>Select Emoloyee</center>";
	}
	
	if (empty($_POST['deptn']))
	{
		$status=1;
		echo "<center class=error>Select Department</center>";
	}
	
	if($status==0)
	{

		$q=mysqli_query($con,"insert into tbl_practicehead (srno,vchemp_id,vchdept_id) values('','$_POST[empn]','$_POST[deptn]')" );
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Practice head is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblpracticehead.php';</script>";
		}
		else
		{
			echo "<center class=error>Practice Head is not created.</center>";
		}
	}
}
?>

<?php 

if(isset($_GET['bupdt']))
{
	//echo "dsjfhsuihjasdh";
	$s=mysqli_query($con,"select * from tbl_practicehead where srno='$_GET[bupdt]' ");
	
			echo "<form method=POST onsubmit=ShowLoading()>";
	if($s)
	{
		echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here</h2>";

		while($r1=mysqli_fetch_array($s))
		{
			//echo "aaaaaaaaaa";
			//$r1=mysqli_fetch_row($s);
			?>
			<select name="emp1" class="textbox" >
			<?php
				$qry=mysqli_query($con,"select * from tbl_emp where vchemp_id NOT IN (select DISTINCT vchemp_id from tbl_practicehead where vchemp_id!='$r1[vchemp_id]')");
				if($qry)
				{
					while($row1=mysqli_fetch_array($qry))
					{
			?>
						<option value="<?php echo $row1['vchemp_id']; ?>" <?php if($r1['vchemp_id']==$row1['vchemp_id']){echo "selected";} ?> <?php if(isset($_POST['emp1'])){if($_POST['emp1']==$r1['vchemp_id']){echo "selected";}} ?> > <?php echo $row1['vchemp_Fname']." ".$row1['vchemp_Lname']; ?> </option>
				<?php }} ?>
			</select>
			<br>
			<select name="dept1" class="textbox" style="margin:12px 0 12px 0;">
			<?php
				$qry=mysqli_query($con,"select * from tbl_dept where vchdept_id NOT IN (select DISTINCT vchdept_id from tbl_practicehead where vchdept_id!='$r1[vchdept_id]')");
				if($qry)
				{
					while($row1=mysqli_fetch_array($qry))
					{
			?>
						<option value="<?php echo $row1['vchdept_id']; ?>" <?php if($r1['vchdept_id']==$row1['vchdept_id']){echo "selected";} ?> <?php if(isset($_POST['dept1'])){if($_POST['dept1']==$r1['vchdept_id']){echo "selected";}} ?> > <?php echo $row1['vchdept_name']; ?> </option>
				<?php }} ?>
			</select>
			<br/>
			<input type="submit" name="btnbupdt" class="button" value="Update">
			<input type="submit" name="btncan" class="button" value="Cancel"><br/>
			<?php
		}
	
		echo "</fieldset>";
	echo "</form>";
	}
	else
	{ 
		//echo mysqli_error($con); 
	}
	
	echo "</form>";
}

?>

<?php  
if(isset($_POST['btnbupdt']))
{
	$status=0;
	
	if (empty($_POST['emp1']))
	{
		$status=1;
		echo "<center class=error>Select Emoloyee</center>";
	}
	
	if (empty($_POST['dept1']))
	{
		$status=1;
		echo "<center class=error>Select Department</center>";
	}
	
	if($status==0)
	{
		$updt=mysqli_query($con,"update tbl_practicehead set vchemp_id='$_POST[emp1]',vchdept_id='$_POST[dept1]' where srno='$_GET[bupdt]'");
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Practice head is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblpracticehead.php';</script>";
		}
	}
}
?>


<?php  
if(isset($_GET['bupdt1']))
{
    $q1=mysqli_query($con,"select * from tbl_practicehead where srno='$_GET[bupdt1]' ");
    $r1=mysqli_fetch_array($q1);
	
	$qry6="select * from tbl_project where vchph='$r1[vchemp_id]' AND bproj_status!='0' ";
	$res=mysqli_query($con,$qry6);
	
	if(mysqli_fetch_array($res)==0)
	{
		
			
		$del=mysqli_query($con,"delete from tbl_practicehead where srno='$_GET[bupdt1]'");
			
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Practice head is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblpracticehead.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Practice head is allocated to the project....')";
		echo "</script>";
	}
}
if(isset($_POST['btncan']))
{
	header('location:tblpracticehead.php');
}
echo "</center>";

?>
</div>