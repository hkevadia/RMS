<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_ph.php";
echo '<div class="font">';

require_once "database.php";

/*$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[userid]' ");
$r=mysqli_fetch_array($q);*/
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dpxyz" ).datepicker({ dateFormat: "dd-mm-yy" });
            $( "#dpxyz" ).datepicker("show");
         });
 $(function() {
            $( "#dpxyz1" ).datepicker({ dateFormat: "dd-mm-yy" });
            $( "#dpxyz1" ).datepicker("show");
         });
      </script>
<?php
if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}
$status=0;

$proj_Err = $sdate_Err = $edate_Err = $bill_per_Err = $per_allocation_Err = $emp_Err = "";
$proj = $sdate = $edate = $bill_per = $per_allocation = $emp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if(empty($_POST["proj"]))
	{
		$status=1;
		$proj_Err = "Select Project";
	}
	/*else 
	{
		$proj = test_input($_POST["proj"]);
	}*/
	
	if(empty($_POST["sdate"]))
	{
		$status=1;
		$sdate_Err = "Select Start Date";
	}
	/*else 
	{
		$sdate = test_input($_POST["$sdate"]);
	}*/
	
	if(empty($_POST["edate"]))
	{
		$status=1;
		$edate_Err = "Select End Date";
	}
	/*else 
	{
		if($_POST["edate"] < $_POST["sdate"] )
	        {
		        $status=1;
		        $edateErr = "Select valid End Date";
	        }
	}*/
	if (empty($_POST["bill_per"])) 
	{
		$status=1;
		$bill_per_Err = "Enter Billability Percentage";
	} 
	else 
	{
		$bill_per = test_input($_POST["bill_per"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[0-9]+$/",$bill_per))
		{
			$status=1;
			$bill_per_Err = "Only numbers are allowded"; 
		}
	}
	
	if (empty($_POST["per_allocation"])) 
	{
		$status=1;
		$per_allocation_Err = "Enter Percentage Allocation";
	} 
	else 
	{
		$per_allocation = test_input($_POST["per_allocation"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[0-9]+$/",$per_allocation))
		{
			$status=1;
			$per_allocation_Err = "Only numbers are allowded"; 
		}
	}
	
	if(empty($_POST["emp"]))
	{
		$status=1;
		$emp_Err = "Select Employee";
	}
	/*else 
	{
		$emp = test_input($_POST["emp"]);
	}*/
	
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Allocate</title>
</head>
<body>
<br/><br/><br/><br/><br/><br/>
<center>
<h2>Allocate Employee</h2>

<form action="#" method="post" onsubmit="ShowLoading()">
<table align="center" border='1' class="t5">
<tr><th colspan='8' align='left'>Allocate Employee</th></tr>
<tr>
<td>Select Project</td>
<td>
<?php 
$query=mysqli_query($con,"select * from tbl_sow where bproj_status!='0' AND vchph='$_SESSION[userid]' or vchdept_id=(select vchdept_id from tbl_practicehead where vchemp_id='$_SESSION[userid]') order by vchproject_name ");

echo "<select name=proj  class='textbox'><option value=''>Select Value</option>";
if($query)
	{
		while($row1=mysqli_fetch_array($query))
		{	
			?>
			<option value="<?php echo $row1['vchproject_id'] ?>" <?php if(isset($_POST['proj'])){if($_POST['proj']==$row1['vchproject_id']){echo "selected";}} ?> > <?php echo $row1['vchproject_id']." | ".$row1['vchproject_name']; ?> </option>
			<?php
		}
	}
	?>
</select><span class="error"> * <?php echo $proj_Err;?></span></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Start Date</td><td><input name="sdate" id="dpxyz" class="textbox" type="text" value="<?php if(isset($_POST['sdate'])) { echo $_POST['sdate']; } ?>" ><span class="error"> * <?php echo $sdate_Err;?></span></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>End Date</td><td><input name="edate" id="dpxyz1" class="textbox" type="text" value="<?php if(isset($_POST['edate'])) { echo $_POST['edate']; } ?>" ><span class="error"> * <?php echo $edate_Err;?></span></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Billability Percentage</td><td><input type="text" class="textbox" name="bill_per" value="<?php if(isset($_POST['bill_per'])) { echo $_POST['bill_per']; } ?>"><span class="error"> * <?php echo $bill_per_Err;?></span></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Percentage Allocation Required</td><td><input type="text" class="textbox" name="per_allocation" value="<?php if(isset($_POST['per_allocation'])) { echo $_POST['per_allocation']; } ?>"><span class="error"> * <?php echo $per_allocation_Err;?></span></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Select Employee</td>
<td>
<?php 
$query=mysqli_query($con,"select * from tbl_emp where bemp_status!='0' order by vchemp_Fname");

echo "<select name=emp class='textbox'><option value=''>Select Value</option>";
if($query)
	{
		while($row1=mysqli_fetch_array($query))
		{	
	?>
	<option value="<?php echo $row1['vchemp_id'] ?>" <?php if(isset($_POST['emp'])){if($_POST['emp']==$row1['vchemp_id']){echo "selected";}} ?> > <?php echo $row1['vchemp_id']." | ".$row1['vchemp_Fname']." ".$row1['vchemp_Lname']; ?> </option>
		<?php
		}
	}
	?>
</select><span class="error"> * <?php echo $emp_Err;?></span></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td  align="center"><input name="btnsub" type="submit" value="Allocate" class="button"></td>

<td><a href="allocation.php"><input type="button" value="Reset" class="button"></a></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr><td class="error" align="right" colspan='8'><h3>* Required Field</h3></td></tr>
</table>
</form>
</center>
<?php

require_once "database.php";

if(isset($_POST['btnsub']))
{	 
	if (empty($_POST['proj'])||empty($_POST['sdate'])||empty($_POST['edate'])||empty($_POST['bill_per'])||empty($_POST['per_allocation'])||empty($_POST['emp']))
	{
		//echo "<center>Fill Required Fields</center>";
	}
	else if($status==1)
	{
		//echo "Enter Valid Values";
	}
	else
	{
		//echo "success";
		$proj = $_POST['proj'];
		$sdate = $_POST['sdate'];
		$edate = $_POST['edate'];
		$bill_per = $_POST['bill_per'];
		$per_allocation = $_POST['per_allocation'];
		$emp = $_POST['emp'];	
		
		$q12=mysqli_query($con,"select * from tbl_sow where vchproject_id='$proj' ");
		$r12=mysqli_fetch_array($q12);

$date = $_POST['sdate'];
                           $dd=date_create($date);
                           $start_date=date_format($dd,"Y-m-d");
                                 $date1 = $_POST['edate'];
                           $dd1=date_create($date1);
                           $end_date=date_format($dd1,"Y-m-d");

        if($end_date < $start_date )
	    {
		    echo "<script type='text/javascript'>";
			echo "alert('Select valid End Date')";
			echo "</script>";
	    }
        else if($start_date < $r12['dsow_startDate'])
		{
			echo "<script type='text/javascript'>";
			echo "alert('Resource Start date should be Greater than SOW Start date')";
			echo "</script>"; 
		}
		else if($end_date > $r12['dsow_endDate'])
		{
			echo "<script type='text/javascript'>";
			echo "alert('Resource End date should be Less than SOW End date')";
			echo "</script>"; 
		}
		else
		{
		$q=mysqli_query($con,"insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$proj','','$start_date','$end_date','1','$bill_per','','$per_allocation','','$emp','','')");
				
		if($q)
		{
			$qry=mysqli_query($con,"select * from tbl_emp where vchemp_id='$emp' ");
			$qry1=mysqli_query($con,"select * from tbl_sow where vchproject_id='$proj' ");
			while($row=mysqli_fetch_array($qry))
			{
				while($row1=mysqli_fetch_array($qry1))
				{
					//generate password and send mail
					$email1= $row['vchemail'];
					$body = "Hello " . $row['vchemp_Fname'] ." ". $row['vchemp_Lname'] . "
You have been allocated in  " . $row1['vchproject_name'] . " for " . $sdate . " to " . $edate ." duration.";

					/*
					This first bit sets the email address that you want the form to be submitted to.
					You will need to change this value to a valid email address that you can access.
					*/
					$webmaster_email = "infostretch@mail.com";
					require_once "database.php";
					$feedback_page = "error_message.html";
					$error_page = "error_message.html";
					$rdirect="res_allocation.php";
					/*
					This bit sets the URLs of the supporting pages.
					If you change the names of any of the pages, you will need to change the values here.
					*/
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
					/*if (!isset($_REQUEST['email'])) {
					header( "Location: $feedback_page" );
					}*/
					// If the form fields are empty, redirect to the error page.
					if (empty($email1) || empty($body)) {
						header( "Location: $error_page" );
					}

					// If email injection is detected, redirect to the error page.
					elseif ( isInjected($email1) ) {
						header( "Location: $error_page" );
					}

					// If we passed all previous tests, send the email then redirect to the thank you page.
					else {
						mail( "$email1", "Welcome to istretch",
						$body, "From: $webmaster_email" );
						echo "<script type='text/javascript'>";
						echo "alert('Resource is allocated Successfully....')";
						echo "</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
				}
			}
		}
		else
		{
			echo "<center class=error>Employee is not allocated.</center>";
		}
	}
	}
}


?>
</div>
</body>
</html>