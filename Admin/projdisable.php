<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";
echo '<div class="font">';
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}
require_once "database.php";
$status=1;
?>
<!DOCTYPE html>
<html>
<head>
<title>project disable</title>
</head>
<body>
<br><br>
<center>

<h2>Project Disable</h2>
<form action="" method="post" onsubmit="ShowLoading()">
<table border= "1" class="t4">
<tr>
<th colspan="2" align="left">Project Name&nbsp;&nbsp;&nbsp; :
 <?php
	require_once "database.php";
	$q=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_GET[projid]' ");
	$row=mysqli_fetch_array($q);
	echo $row['vchproject_name'];
 ?>
</th>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Select Reason</td>
<td>
<select name="reason"  class="textbox">
 <?php
 require_once "database.php";
  $q=mysqli_query($con,"select * from tbl_disable_proj");
 
  while($row=mysqli_fetch_array($q))
  {
   ?>
    <option value="<?php echo $row['vchRea_id']; ?>"><?php echo $row['vchRea_name']; ?></option>
   <?php
  }
 ?>
 </select>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td colspan='2' align="center">
<a href="projdisable.php?btnsub=<?php echo $_GET['projid']; ?>" onClick="return confirm('Are you sure you want to delete?');"><input type="button" value="Submit"  class="button"></a>
<a href="home.php"><input type="button" value="Cancel"  class="button"></a></td>
</tr>
</table>
</form>
</center>

<?php

require_once "database.php";

if(isset($_GET['btnsub']))
{	 
		$rea_id = $_POST['reason'];;		
		
		$q2="update tbl_sow set vchRea_id='$rea_id',bproj_status='0' where vchproject_id='$_GET[btnsub]'";
				
		if (mysqli_query($con,$q2))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Project is disabled successfully....')";
			echo "</script>";
			echo "<script>window.location.href='home.php';</script>";
		}
		else
		{
			echo "<center class=error>Project is not Disabled</center>";
		}		
}

?>
</div>
</body>
</html>