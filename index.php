<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "login.php";
echo "<div class='font'>";
require_once "database.php";

/*if(isset($_SESSION['userid']))
{
	unset($_SESSION['userid']);
	session_destroy();
	header('location:index.php');
}*/


$status=0;

// define variables and set to empty values

$empidErr = $passErr = "";
$empid = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
    if (empty($_POST["empid"]))
	{
		$status=1;
		$empidErr = "Username is required";
	}
	else
	{
		$empid = test_input($_POST["empid"]);
		// check if name only contains letters and whitespace
		if($_POST["empid"]=="admin")
		{
			if (!preg_match("/^admin/",$empid)) 
			{
				$status=1;
				$empidErr = "Enter valid Username"; 
			}
		}
		else
		{
			if (!preg_match("/^[A-Za-z0-9]{2,10}$/",$empid)) 
			{
				$status=1;
				$empidErr = "Enter valid Username"; 
			}
		}
	}
	
	if (empty($_POST["pass"]))
	{
		$status=1;
		$passErr = "Enter Password";
	}
	else
	{
		$pass = test_input($_POST["pass"]);
		// check if name only contains letters and whitespace
		if (!(strlen($pass)>=8))
		{
			$status=1;
			
			$passErr = "Enter valid Password"; 
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

<script>
    var submit = $('form').find('input[type=submit]');
    submit.hide();
    submit.after('<input type=image src=icons/symbol.png />');
</script>
<style>
.lg { text-indent:-9999em; border:0; width:64px; height:64px; background: url('icons/symbol.png') no-repeat 0 0 ; line-height:0 font-size:0; }

.tt
{
	margin-top: -24.5%;
	margin-left: 15%;
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

<body>

<div style="margin-left: 41.5%; position: fixed;">

<form method="post" action="#" onsubmit="ShowLoading()"> 
<center>
<table class="tt">
<caption><h1 style="color: #f37123;">Login</h1></caption>
<tr>
   <td></td> <td class="tb"><img src="icons/black.png" style="height: 25px; width: 25px; margin-top: 5px;" /><input type="text" name="empid" class="textbox" value="<?php if(isset($_POST['empid'])) { echo $_POST['empid']; } ?>"placeholder="Username"></td>
	<td><span class="error">* <?php echo $empidErr;?></span></td>
</tr>	
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>

	<tr><td></td><td class="tb"><img src="icons/security.png" style="height: 25px; width: 25px; margin-top: 5px" /><input type="password"  class="textbox" name="pass" placeholder="Password"></td>
	<td><span class="error" >* <?php echo $passErr; ?></span></td>
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
	
	
<tr><td colspan='2' align="center"><input  type="submit" name="submit" class="lg" title="login"/>
	<!--<a href="home.php"><input type="button" value="Cancel"></a>--></td>
</tr>
<tr>
<td align="center" colspan="2" style="font-family:sans serif";><a href="../RMS/forgot.php">Forgot Password</a></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr>
<tr><td class="error" align="right" colspan="2"><h3 style="color: red;">* Required Field</h3></td></tr>
</table>
</div>
</form>
</center>
</body>

<?php
require_once "database.php";

$empid=$_POST['empid'];
$pass=$_POST['pass'];

				if(isset($_POST['submit']))
				{
					//echo "xxfxc";
	 
					if (empty($_POST['empid'])||empty($_POST['pass']))
					{
						//echo "Fill Required Fields";
					}
					else if($status==1)
					{
						//echo "Enter Valid Values";
					}
					if($status==0)
					{	
						//echo "success";
						if($_POST['empid']=="admin")
						{
							$sql = "select vchemp_id,vchpswd from tbl_user where vchemp_id='$empid' AND vchpswd='$pass'";
							$query=mysqli_query($con,$sql);
								
								if(mysqli_num_rows($query)==1)
								{
									$row=mysqli_fetch_array($query);
									//echo $pass;
									//echo $row['vchpswd'];
									if($pass == $row['vchpswd'])
									{
										//echo "match";
										$_SESSION['adminid']= $empid;
										date_default_timezone_set('Asia/Kolkata');
										$current=date("Y-m-d G:i:s");
										$log=mysqli_query($con,"insert into tbl_primary_log (vchemp_id,iaction_id,daction_time) values ('$_SESSION[adminid]','1','$current') ");
										if($log)
										{
											//sleep(10);
											echo "<script>window.location.href='Admin/home.php';</script>";
										}
										else
										{
											echo "Error in log insertion";
										}
									}
									else
									{
										echo "<center class=error1>Invalid Username or Password.</center>";
									}
								} 
								else
								{
									echo "<center class=error1>No such record found.</center>";
								}
						}
						else if(($_POST['empid']!="admin") || ($_POST['empid']!="Admin") || ($_POST['empid']!="ADMIN"))
						{
							$sql = "select vchemp_id,vchpswd from tbl_user where vchemp_id='$empid' AND vchpswd='$pass'";
						
							$query=mysqli_query($con,$sql);
							 
								if(mysqli_num_rows($query)==1)
								{
									$r=mysqli_fetch_array($query);
									if($pass == $r['vchpswd'])
									{
										//echo "match";
										$qry1=mysqli_query($con,"select * from tbl_emp where vchemp_id='$empid' ");
										$row1=mysqli_fetch_array($qry1);
										$_SESSION['userid']= $empid;
										$_SESSION['usernm']= $row1['vchemp_Fname']." ".$row1['vchemp_Lname'];
										date_default_timezone_set('Asia/Kolkata');
										$current=date("Y-m-d G:i:s");
										$log=mysqli_query($con,"insert into tbl_primary_log (vchemp_id,iaction_id,daction_time) values ('$_SESSION[userid]','1','$current') ");
										if($log)
										{
											if(strtoupper($_POST['empid'])!="ADMIN")
											{
												echo "<script>window.location.href='User/home.php';</script>"; 
											}
										}
										else
										{
											echo "Error in log insertion";
										}
									}
									else
									{
										echo "<center class=error1>Invalid Username or Password.</center>";
									}
								} 
							else
							{
								echo "<center class=error1>No such record found.</center>";
							}
						}
						else
						{
							echo "<center class=error1>Invalid Username or Password.</center>";
						}
					}
				}

?>
</div>		