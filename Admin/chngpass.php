<style>
.fs
{
	width: 100px;
	height: 30px;
	/*background-color: red;*/
	background: url(submit.png) 0 0 no-repeat;

	padding: 0;
	margin: 0;
	border: none;
}
</style>


<?php

session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";
echo "<div class='font'>";


if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}

require_once "database.php";
$status=0;

// define variables and set to empty values

$oldpassErr = $newpassErr = $conpassErr = "";
$oldpass = $newpass = $conpass= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
	if (empty($_POST["oldpass"]))
	{
		$status=1;
		$oldpassErr = "Enter Password";
	}
	else
	{
		$oldpass = test_input($_POST["oldpass"]);
		// check if name only contains letters and whitespace
		if (!(strlen($oldpass)>=8))
		{
			$status=1;
			$oldpassErr = "Enter valid Password"; 
		}
	}
	
	if (empty($_POST["newpass"]))
	{
		$status=1;
		$newpassErr = "Enter New Password";
	}
	else
	{
		$newpass = test_input($_POST["newpass"]);
		// check if name only contains letters and whitespace
		if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&^#])[A-Za-z\d$@$!%*?&^#]{8,15}$/",$newpass))
		{
			$status=1;
			$newpassErr = "Password must be at least 8 characters, no more than 15 characters, 
					and must include at least one upper case letter, one lower case letter,
					one numeric digit, and one special character."; 
		}
	}
	
	if (empty($_POST["conpass"]))
	{
		$status=1;
		$conpassErr = "Enter Confirm Password";
	}
	else
	{
		$conpass = test_input($_POST["conpass"]);
		// check if name only contains letters and whitespace
		if ($newpass != $conpass)
		{
			$status=1;
			// error matching passwords
			$conpassErr = "Your passwords do not match. Please type carefully.";
		}
		/*if (!(strlen($conpass)>=8))
		{
			$status=1;
			$conpassErr = "Enter valid Password"; 
		}*/
	}
	
}	
function test_input($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<html>
<head>
</head>
<body>
<center>
<br><br><br>
<h2>Change Password</h2>
<form method="post" action="" onsubmit="ShowLoading()"> 
<table border="1" class="t4">
<th colspan='8' align='left'>Change Password</th></tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr>
   <td>Old Password</td> <td><input type="password" name="oldpass" class="textbox">&nbsp;<span class="error">* </span></td>
</tr>
<?php if($status=="1"){ ?>
<tr>
<td></td>
<td><span class="error"><?php echo $oldpassErr;?></span></td>
</tr>
<?php } ?>	
	<tr></tr><tr></tr>
<tr>
	<td>New Password</td><td><input type="password" name="newpass" class="textbox">&nbsp;<span class="error">* </span></td>
</tr>	
<?php if($status=="1"){ ?>
<tr>
<td></td>
<td><span class="error"><?php echo $newpassErr; ?></span></td>
</tr>
<?php } ?>
	<tr></tr><tr></tr>
<tr>
	<td>Confirm Password</td><td><input type="password" name="conpass" class="textbox">&nbsp<span class="error">* </span></td>
</tr>	
<?php if($status=="1"){ ?>
<tr>
<td></td>
<td><span class="error"><?php echo $conpassErr; ?></span></td>
</tr>	
<?php } ?>
<tr></tr><tr></tr><tr></tr>	
<tr>
<td colspan="2" align="center">
	<input type="submit" name="submit" value="Submit" class="button">
   <a href="chngpass.php"><input type="button" value="Cancel" class="button"></a></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr><td class="error" colspan="2" align="right"><h3>* Required Field</h3></td></tr>
</table>
</form>
</center>
</body>
</html>

<?php
require_once "database.php";

if(isset($_POST['submit']))
{
	if($status==1)
	{
		//echo "Enter Valid Values";
	}
	if($status==0)
	{	
		//echo "success";
		
		$sql = "select * from tbl_user where vchemp_id='$_SESSION[adminid]' AND vchpswd='$_POST[oldpass]' ";
		
		$query=mysqli_query($con,$sql);
		
		if($query)
		{ 
			if(mysqli_num_rows($query)==1)
			{
				$sql1 = "update tbl_user set vchpswd='$_POST[newpass]' where vchemp_id='$_SESSION[adminid]' ";
				
				$query1=(mysqli_query($con,$sql1));
				
				if($query1)
				{
					echo "<script type='text/javascript'>";
					echo "alert('Password is changed Successfully....')";
					echo "</script>";
					echo "<script>window.location.href='home.php';</script>";
				}
				else
				{
					echo "<center class=error>Password is not Changed</center>";
				}
			}
			else
			{
				echo "<center class=error>Multiple records found</center>";
			}
		}
		else
		{
			echo "<center class=error>No such record found</center>";
		}
	}
}


?>
</div>