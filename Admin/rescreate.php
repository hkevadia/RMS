<style>


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
$empidErr = $fnameErr  =  $lnameErr = $emailErr = $addrErr = $contactErr = $genderErr = $locationErr = $deptErr = $sdeptErr = $designErr = $skillErr = $joindateErr = $ijpErr = "";
$empid = $fname = $lname = $email = $addr = $contact = $gender = $location = $dept = $sdept = $design = $skill = $joindate = $ijp = "";

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
			$contactErr = "Only 10 digits allowed"; 
		}
	}
     
	if (empty($_POST["gender"])) 
	{
		$status=1;
		$genderErr = "Gender is required";
	} 
   
  
	if(empty($_POST["location"]))
	{
		$status=1;
		$locationErr = "Location is required";
	}
	
	if(empty($_POST["dept"]))
	{
		$status=1;
		$deptErr = "Department is required";
	}

	if(empty($_POST["sdept"])) 
	{
		$status=1;
		$sdeptErr = " Sub Department is required";
	}
	
	if(empty($_POST["design"])) 
	{
		$status=1;
		$designErr = "Designation is required";
	}
	
	if(empty($_POST["skill"])) 
	{
		$status=1;
		$skillErr = "Skills are required";
	}
	
	if(empty($_POST["joindate"]))
	{
		$status=1;
		$joindateErr = "Select Joining Date";
	}
	
	if (empty($_POST["ijp"])) 
	{
		$status=1;
		$ijpErr = "IJP is required";
	}
	
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
<title>Create Resource</title>
</head>
<body>
&nbsp;
<center>
<h2 style="margin-top: 25px;">Create Resource</h2>
<div>
<form action="#" method="POST" onsubmit="ShowLoading()"> 

<table border='1' class="t6">
<tr><th colspan='8' align='left'>Personal Details</th></tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>

<tr>
   <td  style="border-top:15px solid transparent">Employee id</td>
   <td  style="border-top:15px solid transparent"><input type="text" class="textbox" maxlength="10" name="empid" value="<?php if(isset($_POST['empid'])) { echo $_POST['empid']; } ?>" placeholder="Employee Id"></td>
	<td colspan='4' style="border-top:15px solid transparent"><span class="error"> * <?php echo $empidErr;?></span></td>
</tr>
<tr></tr><tr></tr>
<tr>
   <td>Full Name  &nbsp;&nbsp; </td>
   <td><input type="text" maxlength="15" class="textbox" name="fname" value="<?php if(isset($_POST['fname'])) { echo $_POST['fname']; } ?>" placeholder="First Name"></td>
   <td><input type="text" maxlength="15" name="mname" class="textbox" value="<?php if(isset($_POST['mname'])) { echo $_POST['mname']; } ?>" placeholder="Middle Name"></td>
   <td ><input type="text" name="lname" maxlength="15" class="textbox" value="<?php if(isset($_POST['lname'])) { echo $_POST['lname']; } ?>" placeholder="Last Name"></td>

</tr>
<tr></tr><tr></tr>
<?php 
	if($status==1)
		{ ?>
<tr>
   <td></td>
   <td class="er"><span class="error"> * <?php echo $fnameErr;?></span></td>
   <td></td>
   <td class="er"><span class="error"> * <?php echo $lnameErr;?></span></td></td>

</tr>
<tr></tr><tr></tr>
<?php
}
?>
<tr>   
   <td style="border-bottom:15px solid transparent">Gender &nbsp;&nbsp;&nbsp;  &nbsp;</td>
   <td style="border-bottom:15px solid transparent"><input type="radio" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender']=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender']=="male") echo "checked";?>  value="male">Male</td>
   <td style="border-bottom:15px solid transparent" colspan='2' class="er"><span class="error"> * <?php echo $genderErr;?></span></td>
  
</tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr><th colspan='8' align='left'>Contact Details</th></tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr>
   <td style="border-top:15px solid transparent">E-mail id</td>
   <td style="border-top:15px solid transparent"><input type="text" name="email"  class="textbox" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" placeholder="abc@xyz.com"></td>
	<td style="border-top:15px solid transparent" colspan='2' class="er"><span class="error"> * <?php echo $emailErr;?></span></td>
	
</tr>
<tr></tr><tr></tr>
<tr>
   <td>Address</td>
   <td><textarea name="address" maxlength="100" class="textbox1" rows="4" cols="25"><?php if(isset($_POST['address'])) { echo $_POST['address']; } ?></textarea></td>
   
</tr>
<tr></tr><tr></tr>
<tr>
   <td style="border-bottom:15px solid transparent">Contact no.</td>
   <td style="border-bottom:15px solid transparent"><input type="number" name="contact" class="textbox" maxlength="10" value="<?php if(isset($_POST['contact'])) { echo $_POST['contact']; } ?>" placeholder="Contact No."></td>
	<td style="border-bottom:15px solid transparent" colspan='2' class="er"><span class="error"> * <?php echo $contactErr;?></span></td>
	
</tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
<tr><th colspan='8' align='left'>Professional Details</th></tr>
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
		<option value="<?php echo $row1['vchlocation_id']; ?>" <?php if(isset($_POST['location'])){if($_POST['location']==$row1['vchlocation_id']){echo "selected";}} ?> > <?php echo $row1['vchlocation_name']; ?> </option>
		<?php
	}
}
?>
</select></td>
    <td colspan='1' class="er"><span class="error"> * <?php echo $locationErr;?></span></td>

	

	<td style="text-align:left;">Designation</td>
	<td><select name="design" class="textbox">
  <?php 
$qry=mysqli_query($con,"select * from tbl_designation order by vchdesignation_name");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchdesignation_id']; ?>" <?php if(isset($_POST['design'])){if($_POST['design']==$row1['vchdesignation_id']){echo "selected";}} ?> > <?php echo $row1['vchdesignation_name']; ?> </option>
		<?php
	}
}
?>
	</select></td>  
	<td colspan='1' class="er"><span class="error"> * <?php echo $designErr;?></span></td>

</tr>
	<tr></tr><tr></tr>

<tr>
	<td style="text-align:left;">Department</td>
	
	<td>
	<?php
		 $qry="select * from tbl_dept order by vchdept_name";
                                        $result = $con->query($qry);
                                        echo "<select  id='dept' name='dept' onchange='showTestSuite(this.value)' class='textbox'>";
                                       // echo "<option value=''>Select One</option>";
										while ($row = mysqli_fetch_array($result)) 
										{
											?>
											<option value="<?php echo $row['vchdept_id']; ?>" <?php if(isset($_POST['dept'])){if($_POST['dept']==$row['vchdept_id']){echo "selected";}} ?> > <?php echo $row['vchdept_name']; ?> </option>
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
	<td colspan='1' class="er"><span class="error"> * <?php echo $deptErr;?></span></td>
	<td style="text-align:left;">
	<div>
                                    <div id='txtHint2' style='height: 20px;'>
                                       <label>Sub Department</label>
                                        <select id="sdept" class='textbox' style=" margin-left: 47%;">
                                            <!--<option value="">Select Department First</option>-->
                                        </select>
										<span class="error" colspan='4'> * <?php echo $sdeptErr;?></span>
                                    </div>
	</div>
								</td>


<?php //echo "$_POST[dept]"; ?>
<!--<td colspan='1' class="er"><span class="error" style=" margin-left: 120%;"> * <?php //echo $sdeptErr;?></span></td>-->
</tr>
<tr></tr><tr></tr>



	
<tr>
<td>Joining date</td>
<td>
<input name="joindate" type="text" id="dpxyz" class="textbox" value="<?php if(isset($_POST['joindate'])) { echo $_POST['joindate']; } ?>" ></td>
<td colspan='1' class="er"><span class="error"> * <?php echo $joindateErr;?></span></td>
<td style="text-align:left;">Through IJP</td>
   <td><input type="radio" name="ijp" value="yes" <?php if (isset($_POST['ijp']) && $_POST['ijp']=="yes") {echo "checked";} ?>  >Yes
   <input type="radio" name="ijp"  value="no" checked <?php if (isset($_POST['ijp']) && $_POST['ijp']=="no") {echo "checked";} ?> >No</td>
   <td colspan='2' class="er"><span class="error"> * <?php echo $ijpErr;?></span></td>
</tr>
<tr></tr><tr></tr>

	<td style="border-bottom:25px solid transparent">Skills</td>
	<td style="border-bottom:25px solid transparent"><select class="textbox1" name="skill[]" multiple>
  <?php 
$qry=mysqli_query($con,"select * from tbl_skills order by vchSkills");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchSkills_id']; ?>" <?php if(isset($_POST['skill'])){foreach($_POST['skill'] as $value){if($value==$row1['vchSkills_id']){echo "selected";}}} ?> > <?php echo $row1['vchSkills']; ?> </option>
		<?php
	}
}
?>
	</select></td>  
	<td colspan='4'><span class="error"> * <?php echo $skillErr;?></span></td>
	


	<tr></tr><tr></tr>
	<tr></tr><tr></tr>
	<tr></tr><tr></tr>
<tr></tr><tr></tr>

<tr>
        <td colspan="1"></td> 
	<td colspan='4' align="center">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Create" class="button"> 
	<a href="rescreate.php"><input type="button" value="Reset" class="button"></a></td>

</tr>
	

   
<tr style="border-bottom:0px solid transparent">
<td colspan="7"></td> <td style="border-bottom:0px solid transparent;text-align:right;"   class="error"><h3>* Required Field&nbsp;&nbsp;&nbsp;</h3></td>
</tr>
</table>
</form>
</center>
</div>


<?php
require_once "database.php";

if(isset($_POST['submit']))
{
	 
	if (empty($_POST['empid'])||empty($_POST['fname'])||empty($_POST['lname'])||empty($_POST['email'])||empty($_POST['gender'])||empty($_POST['contact'])||empty($_POST['location'])||empty($_POST['dept'])||empty($_POST['sdept'])||empty($_POST['design'])||empty($_POST['skill'])||empty($_POST['joindate'])||empty($_POST['ijp']))
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
		
		$empid=$_POST['empid'];
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
		$skill=$_POST['skill'];
		$design=$_POST['design'];
		$joindate=$_POST['joindate'];
		$ijp=$_POST['ijp'];
		$status1=0;
		
		foreach ($skill as $value)
		{
			$skills .= $value . ",";
		}
		$skills = substr($skills,0,-1);  //to remove the last comma

$qmail=mysqli_query($con,"select * from tbl_emp ");
while($rmail=mysqli_fetch_array($qmail))
{
	if($rmail['vchemp_id']==$empid)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Employee id already exist....')";
		echo "</script>";
	}
	if($rmail['vchemail']==$email)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email id already exist....')";
		echo "</script>";
	}
	if($rmail['icontact_no']==$contact)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Contact number already exist....')";
		echo "</script>";
	}
}
		
		$q=mysqli_query($con,"select vchSdept_id from tbl_subdept where vchdept_id='$dept' ");
		while($r=mysqli_fetch_array($q))
		{
			if($r[vchSdept_id]==$sdept)
			{
				$date = $_POST['joindate'];
                           $dd=date_create($date);
                           $joiningdate=date_format($dd,"Y-m-d");
                                 
                               $sql = "insert into tbl_emp (vchemp_id, vchemp_Fname, vchemp_Mname, vchemp_Lname, vchemail, vchgender, vchaddress,icontact_no,vchijp,djoining_date,vchlocation_id,vchdept_id,vchSdept_id,vchdesignation_id,vchSkills_id,dresign_date,dstart_date,dend_date,vchRRea_id,bemp_status) values ('$empid','$fname','$mname','$lname','$email','$gender','$address','$contact','$ijp','$joiningdate','$location','$dept','$sdept','$design','$skills','','','','','1')";
				$query=mysqli_query($con,$sql);
				if($query)
				{ 
					echo "<script type='text/javascript'>";
					echo "alert('Resource is Successfully Created....')";
					echo "</script>";
					echo "<script>window.location.href='home.php';</script>";
				}
				else
				{
					echo "<center class=error>Resource is not created</center>";
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
</body>
</html>			