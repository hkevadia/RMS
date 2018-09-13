<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
//echo "<center>Welcome....<b>".$_SESSION['adminid']."</b></center>";
include "../header.php";

echo "<div class='font'>";


if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}

require_once "database.php";

$status= 1;
?>

<html>
<head>
<script>
	function selchange(obj)
	{
		
	}
	
	function selsub()
	{
		//alert("jkdsfhskjd");
			document.forms[0].submit();
	}
</script>
</head>
<body>
<br><br><br>
<h2 align="center">Allocate User</h2>
<form method="Post" onsubmit="ShowLoading()">
<table align="center" border='1' class="t4">
<th colspan='4' align='left'>Allocate User</th></tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
	<tr>
	<td>Employee Id&nbsp;&nbsp;</td>
	<td>
	<select name="seleid" class="textbox" onchange="selsub()"><option value="">Select Employee</option>
	<?php
		$qry1=mysqli_query($con,"select DISTINCT * from tbl_emp,tbl_practicehead where tbl_practicehead.vchemp_id=tbl_emp.vchemp_id AND tbl_practicehead.vchemp_id NOT IN (select DISTINCT tbl_user.vchemp_id from tbl_user) order by vchemp_Fname");
		if(mysqli_num_rows($qry1)>0)
		{
			$status=0;
			while($row1=mysqli_fetch_array($qry1))
			{
				?>
					<option value="<?php echo $row1['vchemp_id']; ?>" <?php if(isset($_POST['seleid'])){if($_POST['seleid']==$row1['vchemp_id']){echo "selected";}} ?> > <?php echo $row1['vchemp_id']; ?> | <?php echo $row1['vchemp_Fname']; ?> <?php echo $row1['vchemp_Lname']; ?></option>
				<?php
			}
		}
		$qry=mysqli_query($con,"select DISTINCT vchpm,vchemp_id,vchemp_Fname,vchemp_Lname from tbl_emp,tbl_sow where vchpm=vchemp_id AND vchpm NOT IN (select DISTINCT tbl_user.vchemp_id from tbl_user) and vchpm NOT IN (select DISTINCT vchemp_id from tbl_practicehead) order by vchemp_Fname");
		if(mysqli_num_rows($qry)>0)
		{
			$status=0;
			while($row=mysqli_fetch_array($qry))
			{
				?>
					<option value="<?php echo $row['vchemp_id']; ?>" <?php if(isset($_POST['seleid'])){if($_POST['seleid']==$row['vchemp_id']){echo "selected";}} ?> > <?php echo $row['vchemp_id']; ?> | <?php echo $row['vchemp_Fname']; ?> <?php echo $row['vchemp_Lname']; ?></option>
				<?php
			}
		}

		if($status==1)
		{
			echo "<script type='text/javascript'>";
			echo "alert('No data for Create User....')";
			echo "</script>";
			echo "<script>window.location.href='home.php';</script>";
		}
	?>
	</select>
	</td>
	</tr>
	<tr></tr><tr></tr>
	<tr>
	<td>E-mail Id&nbsp;&nbsp;</td>
	<td>
	<?php
		$selemail=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_POST[seleid]' order by vchemp_Fname");
		$remail=mysqli_fetch_array($selemail);
	?>
	<input type="email" name="txtemail" placeholder="abc.xyz@mno.com" required value="<?php echo $remail['vchemail']; ?>" class="textbox" readonly  style="background-color:gray; opacity:0.6"></td>
	</tr>
	<tr></tr><tr></tr><tr></tr>
	<tr>
	<td colspan='2' align="center"><input type="submit" name="btncrt" value="Create" class="button">
	<a href="home.php"><input type="button" value="Cancel" class="button"></a></td>
	
	</tr>
<tr><td></td>
<td>

<?php

require_once "database.php";

function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}



//$pwd=random_password();

if(isset($_POST['btncrt']))
{
	if(empty($_POST['seleid'])||empty($_POST['txtemail']))
	{
		echo "<center class=error style='text-align:right;'>Insert required data</center>";
	}
	else
	{
		$email = $_POST['txtemail'] ;
		$empid = $_POST['seleid'] ;
		$sel=mysqli_query($con,"select * from tbl_emp where vchemail='$_POST[txtemail]' and vchemp_id='$_POST[seleid]'");
		if($row=mysqli_fetch_array($sel))
		{
			//generate password and send mail
			$pwd=random_password();
			$_SESSION['to']=$row['icontact_no'];
			$_SESSION['msg']= "Hello ".$row['vchemp_Fname']." ".$row['vchemp_Lname']."

". "Your InfoStretch Account Username is: " . $_POST['seleid'] ." and Password is: " . $pwd . "

".
"Check Your Mail.";
			$qry=mysqli_query($con,"insert into tbl_user values ('$empid','$pwd',1)");
			if($qry)
			{
			//echo "New User is created Successfully.";
			$webmaster_email = "infostretch@mail.com";
				$feedback_page = "createuser.php";
				$error_page = "error_message.html";

				$txt = "Your InfoStretch Account Username is: " . $_POST['seleid'] ." and Password is: " . $pwd . "

";
				$body = "Hello ".$row['vchemp_Fname']." ".$row['vchemp_Lname'].".....

". $txt .
"Change your Password.

Your new password must meet the following criteria:
1.Password must be at least 8 characters, no more than 15 characters. 
2.Password must include at least one upper case letter, one lower case letter.
3.Password must contain one numeric digit, and one special character.";

				/*
				The following function checks for email injection.
				Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
				*/
				function isInjected($str) {
					$injections = array('(\n+)',
					'(\r+)',
					'(\t+)',
					'(%0A+)',
					'(%0D+)',
					'(%08+)',
					'(%09+)'
					);
					$inject = join('|', $injections);
					$inject = "/$inject/i";
					if(preg_match($inject,$str)) {
						return true;
					}
					else {
						return false;
					}
				}

				// If the user tries to access this script directly, redirect them to the feedback form,
				if (!isset($_POST['txtemail'])) {
				header( "Location: $feedback_page" );
				}

				// If the form fields are empty, redirect to the error page.
				elseif (empty($email) || empty($body)) {
				header( "Location: $error_page" );
				}

				// If email injection is detected, redirect to the error page.
				elseif ( isInjected($email) ) {
				header( "Location: $error_page" );
				}

				// If we passed all previous tests, send the email then redirect to the thank you page.
				else {
				mail( "$email", "Welcome to istretch",
				  $body, "From: $webmaster_email" );
				echo "<script>window.location.href='sms.php';</script>";
				}
			}
			else
			{
				echo "<center class=error>User is not created.</center>";
			}
		}
	        else
                {
                        echo "<center class=error>Enter valid Email-id.</center>";
                }
	}
}

?>
</td>
</tr>
</table>
</form>
</body>
</html>
</div>	