<style>
/*table,td,tr,th
{
	//border-radius: 5px;
	border-color: #2f2f2f;
	//background-color: white;
	border
}
th
{
	background-color: #2f2f2f;
	color: white;
	padding-left: 10px;
	height: 30px;
}
td
{
	border:none;
	padding-left: 10px;
}*/
</style>
<?php

session_start();
error_reporting(E_ERROR | E_PARSE);
//echo "<center>Welcome....<b>".$_SESSION['adminid']."</b></center>";
include "../header.php";
echo "<div class='font'>";
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


		function showTestSuite(str) {
                if (str == "") {
                    document.getElementById("txtHint2").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "GetTestSuite_tester.php?dept=" + str, true);
                xmlhttp.send();
            }


		function selsub()
		{
		 alert("in dept");
		document.forms[0].action="rescreate.php";
		 alert("in deptsawdasd");
		document.forms[0].submit();
		 alert("in deptbbbbbbbb");
		}

      </script>
<?php
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}

require_once "database.php";
$status=0;
$skills = "";
// define variables and set to empty values
$fnameErr = $mnameErr =  $lnameErr = $emailErr = $addrErr = $contactErr = $genderErr = $locationErr = $deptErr = $sdeptErr = $designErr = $skillErr = $joindateErr = $ijpErr = "";
$fname = $mname = $lname = $email = $addr = $contact = $gender = $location = $dept = $sdept = $design = $skill = $joindate = $ijp = $confirm = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   if (empty($_POST["fname"])) 
	{
		$status=1;
		
		$fnameErr = "First Name is required";
	}
	else 
	{
		$fname = test_input($_POST["fname"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z]*$/",$fname)) 
		{
			$status=1;
			
			$fnameErr = "Only letters allowed"; 
		}
	}
   
	if (empty($_POST["lname"])) 
	{
		$status=1;
		
		$lnameErr = "Last Name is required";
	}
	else
	{
		$lname = test_input($_POST["lname"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z]*$/",$lname)) 
		{
			$status=1;
			
			$lnameErr = "Only letters allowed"; 
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
   
    if (empty($_POST["contact"])) 
	{
		$status=1;
		
		$contactErr = "Contact No. is required";
	}
	else 
	{
		$contact = test_input($_POST["contact"]);
		// check if contact only contains numbers
		if (!preg_match("/^[0-9]*$/",$contact)) 
		{
			$status=1;
			
			$contactErr = "Only numbers allowed"; 
		}
		else if (strlen($contact)!=10)
		{
			$status=1;
			
			$contactErr = "Enter valid Contact number"; 
		}
	}

	if (empty($_POST["gender"])) 
	{
		$status=1;
		
		$genderErr = "Gender is required";
	} 
	/*else 
	{
		$gender = test_input($_POST["gender"]);
	}*/
   
  
	if(empty($_POST["location"]))
	{
		$status=1;
		
		$locationErr = "Location is required";
	}
	/*else {
		$location = test_input($_POST["location"]);
	}*/
	
	if(empty($_POST["dept"]))
	{
		$status=1;
		
		$deptErr = "Department is required";
	}
	/*else 
	{
		$dept = test_input($_POST["dept"]);
	}*/

	if(empty($_POST["sdept"])) 
	{
		$status=1;
		
		$sdeptErr = " Sub Department is required";
	}
	/*else 
	{
		$sdept = test_input($_POST["sdept"]);
	}*/
	
	if(empty($_POST["design"])) 
	{
		$status=1;
		
		$designErr = "Designation is required";
	}
	/*else 
	{
		$design = test_input($_POST["design"]);
	}*/
	
	if(empty($_POST["skill"])) 
	{
		$status=1;
		$skillErr = "Skills are required";
	}
	/*else 
	{
		$skill = test_input($_POST["skill"]);
	}*/
	
	if(empty($_POST["joindate"]))
	{
		$status=1;
		$startdateErr = "Select Joining Date";
	}
	/*else 
	{
		$joindate = test_input($_POST["$joindate"]);
	}*/
	
	if (empty($_POST["ijp"])) 
	{
		$status=1;
		
		$ijpErr = "IJP is required";
	} 
	/*else 
	{
		$ijp = test_input($_POST["ijp"]);
	}*/
	
 }

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Update Resource</title>
<!--<script type='text/javascript'>
function disable()
{
    if (confirm("Are u sure to disable this employee??")) 
	{
        return true;
    }
	else 
	{
        return false;
    }
}
</script>-->
</head>
<body>
<center>
<br><br>
<h2>Update Resource</h2>

<!--<form method="get" onsubmit="ShowLoading()">
<table>
<tr>
<td>Select Employee ID</td>
<td>
<select name="empid" class="textbox">
  <?php 
/*$qry=mysqli_query($con,"select * from tbl_emp where bemp_status!='0' order by vchemp_Fname");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchemp_id']; ?>" <?php if(isset($_GET['empid'])){if($_GET['empid']==$row1['vchemp_id']){echo "selected";}} ?> > <?php echo $row1['vchemp_id'].' | '.$row1['vchemp_Fname'].' '.$row1['vchemp_Lname']; ?> </option>
		<?php
	}
}*/
?>
</select></td>
<td><input type="submit" name="btnedit" value="Ok" class="button"> </td>

</tr>
</table>
</form>-->
</center>
</body>
</html>

<?php
include("database.php");
//if(isset($_GET['btnedit']))
//{
	$sql1= "SELECT * FROM tbl_emp WHERE vchemp_id='$_GET[demp]'"; // Please look at this too.
	
	$result = mysqli_query($con,$sql1) or die (mysql_error()); // dont put spaces in between it, else your code wont recognize it the query that needs to be executed
	
	while ($row = mysqli_fetch_array($result))
	{     // here too, you put a space between it


?>
  
  
<!DOCTYPE html>
<html>
<head>
<title>Update Resource</title>
</head>
<body>
&nbsp;
<form method="post" action="#" onsubmit="ShowLoading()">
<center>
<table border='1' class="t6">
<tr><th colspan='8' align='left'>Personal Details</th></tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr>
   <td style="border-top:15px solid transparent">Employee id</td>
   <td colspan='1' style="border-top:15px solid transparent"><input type="text" name="empid1" class="textbox" value="<?php echo $row['vchemp_id']; ?>" placeholder="Employee Id" readonly>
	</td>
</tr>
	<tr></tr><tr></tr>
<tr>
   <td>Full Name</td>
   <td><input type="text" maxlength="15" class="textbox" name="fname" value="<?php echo $row['vchemp_Fname']; ?>" placeholder="First Name"></td>
   <td><input type="text" name="mname" maxlength="15" class="textbox" value="<?php echo $row['vchemp_Mname']; ?>" placeholder="Middle Name"></td>
   <td><input type="text" class="textbox" name="lname" maxlength="15" value="<?php echo $row['vchemp_Lname']; ?>" placeholder="Last Name"></td>
</tr>
	<tr></tr><tr></tr>
<tr>
<?php 
	if($status==1)
		{ ?>
   <td></td>
   <td><span class="error"> * <?php echo $fnameErr;?></span></td>
   <td></td>
   <td><span class="error"> * <?php echo $lnameErr;?></span></td>
</tr>
	<tr></tr><tr></tr>
<?php
}
?>
<tr>   
   <td style="border-bottom:15px solid transparent">Gender</td>
   <td style="border-bottom:15px solid transparent"><input type="radio" name="gender"  value="female" <?php if ($row['vchgender']=="female") {echo "checked";} ?> >Female
   <input type="radio" name="gender" value="male" <?php if ($row['vchgender']=="male") {echo "checked";} ?> >Male </td>
   <td colspan='2'><span class="error"> * <?php echo $genderErr;?></span></td>
</tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr><th colspan='8' align="left">Contact Details</th></tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>

<tr>
   <td style="border-top:15px solid transparent">E-mail id</td>
   <td style="border-top:15px solid transparent"><input type="text"  class="textbox" name="email"  value="<?php echo $row['vchemail']; ?>" placeholder="abc@xyz.com"></td>
   <td colspan='2' style="border-top:15px solid transparent"><span class="error"> * <?php echo $emailErr;?></span></td>
</tr>
	<tr></tr><tr></tr>
<tr>
   <td>Address</td>
   <td colspan='1'><textarea name="address" maxlength="100" rows="4" cols="25" class="textbox1"><?php echo $row['vchaddress']; ?></textarea></td>
</tr>
	<tr></tr><tr></tr>
<tr>
   <td style="border-bottom:15px solid transparent">Contact no.</td>
   <td style="border-bottom:15px solid transparent"><input type="text" name="contact" class="textbox" maxlength="10" value="<?php echo $row['icontact_no']; ?>" placeholder="Contact No."></td>
   <td colspan='2'><span class="error"> * <?php echo $contactErr;?></span></td>
</tr>

<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr><th colspan='8' align="left">Professional Details</th></tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>

<tr>   
   <td style="border-top:15px solid transparent">Location</td>
   <td style="border-top:15px solid transparent"><select name="location" class="textbox">
  <?php 
$qry=mysqli_query($con,"select * from tbl_location order by vchlocation_name");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchlocation_id']; ?>" <?php if($row['vchlocation_id']==$row1['vchlocation_id']){echo "selected";} ?> > <?php echo $row1['vchlocation_name']; ?> </option>
		<?php
	}
}
?>
</select></td>
    <td colspan='2'><span class="error"> * <?php echo $locationErr;?></span></td>


	<td>Designation</td>
	<td><select name="design" class="textbox">
  <?php 
$qry=mysqli_query($con,"select * from tbl_designation order by vchdesignation_name");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchdesignation_id']; ?>" <?php if($row['vchdesignation_id']==$row1['vchdesignation_id']){echo "selected";} ?> > <?php echo $row1['vchdesignation_name']; ?> </option>
		<?php
	}
}
?>
	</select></td>
	<td colspan='2'><span class="error"> * <?php echo $designErr;?></span></td>
</tr>

	<tr></tr><tr></tr>
<tr>
	<td style="text-align:left;">Department</td>
	
	<td>
	<?php
	$_SESSION['sdept12']=$row['vchSdept_id'];
		 $qry="select * from tbl_dept order by vchdept_name";
                                        $result = $con->query($qry);
                                        echo "<select  id='dept' name='dept' onchange='showTestSuite(this.value)' class='textbox'>";
                                        //echo "<option value=''>Select One</option>";
										while ($row1 = mysqli_fetch_array($result)) 
										{
											?>
											<option value="<?php echo $row1['vchdept_id']; ?>" <?php if($row['vchdept_id']==$row1['vchdept_id']){echo "selected";} ?> > <?php echo $row1['vchdept_name']; ?> </option>
											<?php
										}
                                        /*while ($row = mysqli_fetch_array($result)) 
										{
                                            //echo "<option value={$row['vchdept_id']}>{$row['vchdept_name']}</option>";
											echo "<option value='$row[vchdept_id]'>{$row['vchdept_name']}</option>";
                                        }*/
                                        echo "</select>";
	?>
	</td>
	<td colspan='2' class="er"><span class="error"> * <?php echo $deptErr;?></span></td>
	<td style="text-align:left;">
	
                                    <div id='txtHint2' style='height: 20px;'>
                                        <label>Sub Department</label>
										<input type="text" style=" margin-left: 47%;" class="textbox" value="<?php
										$qsdept=mysqli_query($con,"select * from tbl_subdept where vchSdept_id='$row[vchSdept_id]'");
										$rsd=mysqli_fetch_array($qsdept);
										echo $rsd['vchSdept_name']; ?>" name="sedpt" readonly>
                                        <!--<select id="sdept" class='textbox' style=" margin-left: 47%;">
										
                                            <option value="">Select Department First</option>
                                        </select>-->
										<span class="error"> * <?php echo $sdeptErr;?></span>
                                    </div>
	
								</td>


<?php //echo "$_POST[dept]"; ?>
<!--<td colspan='1' class="er"><span class="error" style=" margin-left: 120%;"> * <?php //echo $sdeptErr;?></span></td>-->
</tr>
<tr></tr><tr></tr>
<tr>
<td>Joining date</td>
<td>

<input name="joindate" type="text" id="dpxyz" class="textbox" 
 value="<?php echo  $row['djoining_date']; ?>" ></td>
 <td colspan='2'><span class="error"> * <?php echo $joindateErr;?></span>
</td>

   <td>Through IJP</td>
   <td><input type="radio" name="ijp" <?php if ($row['vchijp']=="yes") {echo "checked";} ?>  value="yes">Yes
   <input type="radio" name="ijp" <?php if ($row['vchijp']=="no") {echo "checked";} ?>  value="no">No</td>
   <td colspan='2'><span class="error"> * <?php echo $ijpErr;?></span></td>
</tr>


	<tr></tr><tr></tr>
<tr>
	<td style="border-bottom:25px solid transparent">Skills</td>
	<td style="border-bottom:25px solid transparent"><select name="skill[]" class="textbox1" multiple="multiple">
  <?php 
$qry=mysqli_query($con,"select * from tbl_skills order by vchSkills");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchSkills_id'];?>" <?php $i=explode(",",$row['vchSkills_id']); foreach($i as $value){if($value==$row1['vchSkills_id']){echo "selected";}} ?> > <?php echo $row1['vchSkills']; ?> </option>
		<?php
	}
}
?>
	</select></td>
	<td colspan='2'><span class="error"> * <?php echo $skillErr;?></span></td>
</tr>
<tr>
<td colspan="2"></td>
<td colspan='3' align="center">
<input type="submit" class="button" name="update" value="Update">
<a href="linkemp.php"><input type="button" class="button" value="Cancel"></a></td>
</tr>
<tr>
<td colspan="4"></td><td align="right" class="error" ><h3>* Required Field&nbsp;&nbsp;&nbsp;</h3></td>
</tr>

</table>
</center>
</form>

<?php
   
    }
//}
?>

<?php
include("database.php");

if(isset($_POST['update']))
{
	 
	if (empty($_POST['fname'])||empty($_POST['lname'])||empty($_POST['email'])||empty($_POST['gender'])||empty($_POST['contact'])||empty($_POST['location'])||empty($_POST['dept'])||empty($_POST['sdept'])||empty($_POST['design'])||empty($_POST['skill'])||empty($_POST['joindate'])||empty($_POST['ijp']))
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
		$empid1=$_POST['empid1'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];
		$location=$_POST['location'];
		$dept=$_POST['dept'];
		$sdept=$_POST['sdept'];
		$design=$_POST['design'];
		$skill=$_POST['skill'];
		$joindate=$_POST['joindate'];
		$ijp=$_POST['ijp'];
		$status1=0;
		
		foreach ($skill as $value)
		{
			$skills .= $value . ",";
		}
		$skills = substr($skills,0,-1);  //to remove the last comma
		
		$q=mysqli_query($con,"select vchSdept_id from tbl_subdept where vchdept_id='$dept' ");
		while($r=mysqli_fetch_array($q))
		{
			if($r[vchSdept_id]==$sdept)
			{
				//$status1='1';
 $date = $_POST['joindate'];
                           $dd=date_create($date);
                           $joiningdate=date_format($dd,"Y-m-d");
                          
				$mysql=mysqli_query($con,"update tbl_emp set vchemp_Fname='$fname',vchemp_Mname='$mname',vchemp_Lname='$lname',vchemail='$email',vchgender='$gender',vchaddress='$address',icontact_no='$contact',vchijp='$ijp',djoining_date='$joindate',vchlocation_id='$location',vchdept_id='$dept',vchSdept_id='$sdept',vchdesignation_id='$design',vchSkills_id='$skills' where vchemp_id='$empid1' ");
				if($mysql)
				{
					echo "<script type='text/javascript'>";
					echo "alert('Resource is updated successfully....')";
					echo "</script>";
					echo "<script>window.location.href='linkemp.php';</script>"; 
				}
				else
				{
					echo "<center class=error>Resource is not updated</center>";
				}
			}
			else
			{
				$status1='1';
			}
		}
		if($status1=='1')
		{
			echo "<script type='text/javascript'>";
			echo "alert('Select valid sub-department....')";
			echo "</script>";
		}
	}
}

?>
</div>
</body>
</html>



		