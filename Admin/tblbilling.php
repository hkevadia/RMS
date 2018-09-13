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

$query=mysqli_query($con,"select * from tbl_billing");
echo "<center><form method=POST onsubmit=ShowLoading()>";
if(isset($_GET['btnadd']))
{
	if($query)
	{
		?>
			<table class="t2" style="width:45%;">
			<br><br><br>
			<h2>Manage Billing Type</h2>
			<tr><th>Billing ID</th><th>Type</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchbilling_id'];?> </td>
			<td><?php echo $r['vchbilling_type'];?> </td>
			<td></td>
			</tr>
			<?php } ?>
			<tr>
			<td><input type="text" name="txtbidn" class="textbox" value="<?php if(isset($_POST['txtbidn'])) { echo $_POST['txtbidn']; } ?>"></td>
			<td><input type="text" name="txtbnmn"  class="textbox" value="<?php if(isset($_POST['txtbnmn'])) { echo $_POST['txtbnmn']; } ?>"></td>
			<td><input type="submit" name="btnadbtype" class="lg" title="Save">&nbsp;<a href="tblbilling.php"><img src="../icons/can.png"  class = "ig" title="Cancel" name="cancel" ></td></td>
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
			<h2>Manage Billing Type</h2>
			<tr><th>Billing ID</th><th>Type</th><th>Actions</th></tr>
			<?php
			while($r=mysqli_fetch_array($query))
			{
			?>
			<tr>
			<td><?php echo $r['vchbilling_id'];?> </td>
			<td><?php echo $r['vchbilling_type'];?> </td>
			<td class="tb2" align="center"><a href="tblbilling.php?bupdt=<?php echo $r['vchbilling_id'];?>"><img src="../icons/edit.png" class = "ig" title="Update" name="update" ></a>
				<a href="tblbilling.php?bupdt1=<?php echo $r['vchbilling_id'];?>" onClick="return confirm('Are u sure you want to delete?');"><img src="../icons/remove.png" class = "ig" title="Delete" name="delete"></a></td>
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

if(isset($_POST['btnadbtype']))
{
	$status=0;
	
	if (empty($_POST['txtbidn']))
	{
		$status=1;
		echo "<center class=error>Billing Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtbidn']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Billing Id</center>"; 
		}
	}
	if (empty($_POST['txtbnmn']))
	{
		$status=1;
		echo "<center class=error>Billing Type is required</center>";
	}
	else
	{
		if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtbnmn']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}
	}

	if($status==0)
	{
$qdept=mysqli_query($con,"select vchbilling_id from tbl_billing where vchbilling_id='$_POST[txtbidn]'");
if(mysqli_num_rows($qdept)>0)
{
echo "<script type='text/javascript'>";
echo "alert('Billing id already exist....')";
echo "</script>";
}
else
{

		$q=mysqli_query($con,"insert into tbl_billing values('$_POST[txtbidn]','$_POST[txtbnmn]')");
		if($q)
		{
			//echo "inserted";
			echo "<script type='text/javascript'>";
			echo "alert('Billing type is created successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblbilling.php';</script>";
		}
		else
		{
			echo "<center class=error>Billing Type is not created.</center>";
		}
}
	}
}
?>

<?php 
echo "<div id='popu'>";
if(isset($_GET['bupdt']))
{
	//echo "dsjfhsuihjasdh";
	$s=mysqli_query($con,"select * from tbl_billing where vchbilling_id='$_GET[bupdt]'");
	
			echo "<br><form method=POST onsubmit=ShowLoading()>";
			echo "<fieldset style='border:none;'><h2>Update Here</h2>";
	if($s)
	{
		while($r1=mysqli_fetch_array($s))
		{
			//echo "aaaaaaaaaa";
			//$r1=mysqli_fetch_row($s);
			?>
			<input type="text" name="txtbid1" class="textbox" value="<?php echo $r1['vchbilling_id'];?>" readonly><br>
			<input type="text" name="txtbnm1" class="textbox" style="margin:12px 0 12px 0;" value="<?php echo $r1['vchbilling_type'];?>"><br>
			<input type="submit" name="btnbupdt" class="button" value="Update">
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
echo "</div>";

?>

<?php  
if(isset($_POST['btnbupdt']))
{
	$status=0;
	
	if (empty($_POST['txtbid1']))
	{
		$status=1;
		echo "<center class=error>Billingl Id is required</center>";
	}
	else
	{
		if(!preg_match("/^[A-Za-z0-9]{1,10}$/",$_POST['txtbid1']))
		{
			$status=1;
			echo "<center class=error>Enter Valid Billing Id</center>"; 
		}
	}
	if (empty($_POST['txtbnm1']))
	{
		$status=1;
		echo "<center class=error>Billing Type is required</center>";
	}
	else
	{
		/*if (!preg_match("/^[A-Z a-z]*$/",$_POST['txtbnm1']))
		{
			$status=1;
			echo "<center class=error>Only letters allowed</center>"; 
		}*/
	}
	if($status==0)
	{
		$updt=mysqli_query($con,"update tbl_billing set vchbilling_id='$_POST[txtbid1]',vchbilling_type='$_POST[txtbnm1]' where vchbilling_id='$_GET[bupdt]'");
		if($updt)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Billing type is updated successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblbilling.php';</script>";
		}
		else
		{
			echo "<center class=error>Billing type is not updated</center>";
		}
	}
}
?>


<?php  
if(isset($_GET['bupdt1']))
{
	$qry1="select * from tbl_project where vchbilling_type='$_GET[bupdt1]' AND bproj_status!='0' ";
	$res=mysqli_query($con,$qry1);
	
	if(mysqli_fetch_array($res)==0)
	{
//echo "dsfsdf";
		
		
		$del=mysqli_query($con,"delete from tbl_billing where vchbilling_id='$_GET[bupdt1]'");
		
		if($del)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Billing type is deleted successfully....')";
			echo "</script>";
			echo "<script>window.location.href='tblbilling.php';</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>";
		echo "alert('Billing type is allocated to the employee....')";
		echo "</script>";
	}
}
if(isset($_POST['btncan']))
{
	header('location:tblbilling.php');
}
echo "</center>";

?>
</div>			