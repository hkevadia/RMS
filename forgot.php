<script type="text/javascript">
    function ShowLoading(e) {
        var div = document.createElement('div');
        var img = document.createElement('img');
        img.src = 'icons/loader.gif';
        div.innerHTML = "<b>Loading...<br/><br/></b>";
        div.style.cssText = 'position: fixed; top: 1%; left: 45%; border: none; height:10px; width:10px;' ;
        div.appendChild(img);
        document.body.appendChild(div);
        return true;
    }
</script>

<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "login.php";
echo "<div class='font'>";



/*if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:index.php');
}
if($_SESSION['userid']=='E1')
{
	include "header_ph.php";
}
else
{
	include "header_pm.php";
}*/
require_once "database.php";
$status=0;

// define variables and set to empty values

$empidErr = $emailErr = "";
$empid = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
    if (empty($_POST["empid"]))
	{
		$status=1;
		$empidErr = "Emp id is required";
	}
	else
	{
		$empid = test_input($_POST["empid"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[A-Za-z0-9]{2,10}$/",$empid)) 
		{
			$status=1;	
			$empidErr = "Enter valid Employee Id"; 
		}
	
	}
	if (empty($_POST["email"])) 
	{
	    $status=1;
		
		$emailErr = "Email is required";
	} 
	else 
	{
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$status=1;
			
			$emailErr = "Invalid email format"; 
		}
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

<style>
.lg { 
		text-indent:-9999em; border:0; width:64px; height:64px; background: url('icons/symbol.png') no-repeat 0 0;line-height:0 font-size:0; 
	}

.pg { 
		text-indent:-9999em; border:0; width:64px; height:64px; background: url('icons/arrows.png') no-repeat 0 0 ; line-height:0 font-size:0; margin-left: -70px;
	}

.tt
{
	margin-top: -25.5%;
	margin-left: 56%;
	position: fixed;
}
.tb
{
	border-radius: 5px;
	border: 1px #f37123;
	box-shadow: 0 0 1px 1px #ffa366;
	height: 40px;
	width: 230px;
	background-color: #E1E2E4;
	

}
.textbox
{
	height: 40px;
	width: 200px;
	float: right;
	background-color: #ccc;
	opacity: 0.8;
	background-blend-mode: color-dodge;


}
:placeholder-shown
{
	font-size:large;
	font-weight: 100%;
	padding-left: 30px;
}
.error
{
	color: red;
}
.error1
{
	color: red;
	margin-top: -40px;
	z-index: 5;
}
input[placeholder], [placeholder], *[placeholder] {
    color: black !important;
    font-weight: 550;
    font-size: 20px;
}


</style>




<form method="post" action="#" onsubmit="ShowLoading()"> 
<center>
<table class="tt">
<caption style="color: #f37123;"><h1>Forgot Password</h1></caption>
<tr>
   <td></td> <td class="tb"><img src="icons/black.png" style="height: 25px; width: 25px; margin-top: 5px;" /><input type="text" name="empid" class="textbox" value="<?php if(isset($_POST['empid'])) { echo $_POST['empid']; } ?>"placeholder="Username"></td>
	<td><span class="error">* <?php echo $empidErr;?></span></td>
</tr>	
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
	<tr><td></td><td class="tb"><img src="icons/dark.png" style="height: 25px; width: 25px; margin-top: 5px; margin-left: 2px;" />
	<input type="text" name="email" class="textbox" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" placeholder="abc@xyz.com"></td>
   <td><span class="error">* <?php echo $emailErr;?></span></td>
</tr>	
<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>

<tr><td colspan='2' align="center"><input  type="submit" name="submit" class="lg" title="submit"/>
	<!--<a href="home.php"><input type="button" value="Cancel"></a>-->
</td><td>
	<a href="../RMS/index.php"><input type="button" value="Cancel" class="pg" title="Return"></a></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr>
<!--<tr>
<td><a href="forgot.php">Forgot Password</a></td>
</tr>-->
<tr><td class="error" align="right" colspan="2"><h3 style="color: red;">* Required Field</h3></td></tr>
</table>
</center>
</form>
</center>

<?php
require_once "database.php";

//$empid=$_POST['empid'];
//$pass=$_POST['pass'];

if(isset($_POST['submit']))
{
	 
	if (empty($_POST['empid'])||empty($_POST['email']))
	{
		//echo "Fill Required Fields";
	}
	else if($status==1)
	{
		//echo "Enter Valid Values";
	}
	if($status==0)
	{	
		function random_password( $length = 8 ) 
		{
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
			$password = substr( str_shuffle( $chars ), 0, $length );
			return $password;
		}
		
		$sql = "select tbl_user.vchemp_id,vchemp_Fname,vchemp_Lname,vchemail,icontact_no from tbl_user,tbl_emp where (tbl_user.vchemp_id='$empid' AND vchemail='$email') AND tbl_emp.vchemp_id=tbl_user.vchemp_id";
		
		$res=mysqli_query($con,$sql);
		
		if($row=mysqli_fetch_array($res))
		{ 
				$pass=random_password();
				$_SESSION['to']=$row['icontact_no'];
			$_SESSION['msg']= "Hello ".$row['vchemp_Fname']." ".$row['vchemp_Lname']."

". "Your Account Password at InfoStretch is: " . $pass . "

".
"Check Your Mail.";
				$sql1= "update tbl_user set vchpswd='$pass' where vchemp_id='$empid'";
				$query1=mysqli_query($con,$sql1);
				if($query1)
				{
                                        /*
					This first bit sets the email address that you want the form to be submitted to.
					You will need to change this value to a valid email address that you can access.
					*/

					$webmaster_email = "infostretch@mail.com";
					require_once "database.php";

					/*
					This bit sets the URLs of the supporting pages.
					If you change the names of any of the pages, you will need to change the values here.
					*/

					$feedback_page = "forgot.php";
					$error_page = "error_message.html";
					$thankyou_page = "thank_you.html";

					/*
					This next bit loads the form field data into variables.
					If you add a form field, you will need to add it here.
					*/
					$email = $_POST['email'] ;
					$empid = $_POST['empid'] ;


					$txt = "New Password for your account at InfoStretch is: " . $pass . "

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
					if (!isset($_REQUEST['email'])) {
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
					echo "<center class=error>Something went wrong.</center>";
				}
		} 
		else
		{
			echo "<center class=error>No such record found.</center>";
		}
	}
	else
	{
		//echo "status is not 0.";
	}
}


?>